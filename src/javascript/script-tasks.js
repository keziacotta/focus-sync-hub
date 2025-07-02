//Para ocultar a task e aparecer a opção de editar
$(document).ready(function () {
    $(document).on('click', '.edit-button', function (e) {
        const task = $(this).closest('.task');
        task.find('.progress').addClass('hidden');
        task.find('.task-description').addClass('hidden');
        task.find('.task-actions').addClass('hidden');
        task.find('.edit-task').removeClass('hidden');
    console.log(this);
    });
});

//Para aparecer um risco nas tarefas concluídas
    $('.progress').on('click', function () {
        if ($(this).is(':checked')) {
            $(this).addClass('done');
        } else {
            $(this).removeClass('done');
        }
            console.log(this);
    });

