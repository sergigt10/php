$(document).ready(function() {
  // Global Settings
  let edit = false;

  // Testing Jquery
  console.log('jquery is working!');

  // Funció de mostrar totes les tasques
  fetchTasks();

  // Ocultem el div per mostrar els resultats cercats
  $('#task-result').hide();


  // search key type event
  // Buscador
  $('#search').keyup(function() {
    // Si no està buit
    if($('#search').val()) {
      // Guardem el valor escrit a l'input
      let search = $('#search').val();
      // Permet fer una petició al servidor
      $.ajax({
        // A on fem la petició
        url: 'task-search.php',
        // Dades que enviem
        data: {search},
        // Mètode de petició
        type: 'POST',
        // Si pasa algo correcte
        success: function (response) {
          if(!response.error) {
            // Tornem a convertir a JSON la resposta
            let tasks = JSON.parse(response);
            let template = '';
            // Recorrem l'objecte JSON
            // Cada cop que recorri obtenim una tasca
            tasks.forEach(task => {
              template += `<li><a href="#" class="task-item">${task.name}</a></li>` 
            });
            // Activem el div per mostrar els resultats cercats
            $('#task-result').show();
            // L'oplim amb els resultats
            $('#container').html(template);
          }
        } 
      })
    }
  });

  // Afegir tasca
  $('#task-form').submit(e => {
    // Evitem refresc
    e.preventDefault();
    // Guardem en un objecte i s'enviaràn al servidor
    const postData = {
      // Obtenim el valor de l'input name
      name: $('#name').val(),
      description: $('#description').val(),
      id: $('#taskId').val()
    };
    // Valor ternari. Si es fals = task-add.php sino task-edit.php.
    const url = edit === false ? 'task-add.php' : 'task-edit.php';
    console.log(postData, url);
    // Una variant com funciona $.ajax (funcionament semblant)
    $.post(url, postData, (response) => {
      console.log(response);
      // Reset del formulari
      $('#task-form').trigger('reset');
      // Obtenir totes les tasques
      fetchTasks();
    });
  });

    // Mostrar totes les tasques
    function fetchTasks() {
    $.ajax({
        url: 'tasks-list.php',
        type: 'GET',
        success: function(response) {
            const tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task => {
                template += `
                    <tr taskId="${task.id}">
                    <td>${task.id}</td>
                    <td>
                    <a href="#" class="task-item">
                    ${task.name} 
                    </a>
                    </td>
                    <td>${task.description}</td>
                    <td>
                    <button class="task-delete btn btn-danger">
                        Delete 
                    </button>
                    </td>
                    </tr>
                    `
            });
            $('#tasks').html(template);
        }
    });
}

  // Get a Single Task by Id 
  // Escoltar element clic
  $(document).on('click', '.task-item', (e) => {
    // this = fa referencia al boto clicat.
    // this[0] = conte tot el boto
    // parentElement = obtenim qui es el pare de l'emement
    // activeElement = L'element clicat per nosaltres
    const element = $(this)[0].activeElement.parentElement.parentElement;
    // Obtenim id si té l'atribut taskId
    const id = $(element).attr('taskId');
    // 
    $.post('task-single.php', {id}, (response) => {
      const task = JSON.parse(response);
      $('#name').val(task.name);
      $('#description').val(task.description);
      $('#taskId').val(task.id);
      edit = true;
    });
    e.preventDefault();
  });

  // Delete a Single Task
  $(document).on('click', '.task-delete', (e) => {
    if(confirm('Are you sure you want to delete it?')) {
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const id = $(element).attr('taskId');
      // Eliminem la tasca
      $.post('task-delete.php', {id}, (response) => {
        fetchTasks();
      });
    }
  });
});
