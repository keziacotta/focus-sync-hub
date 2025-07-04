$(document).ready(function () {
    // Quando clicar no botão de editar
    $(document).on('click', '.edit-button', function () {
        const task = $(this).closest('.task');
        task.find('.progress').addClass('hidden');
        task.find('.task-description').addClass('hidden');
        task.find('.task-actions').addClass('hidden');
        task.find('.edit-task').removeClass('hidden');
    });

    // Quando clicar na checkbox de progresso
    $(document).on('change', '.progress', function () {
        const checkbox = $(this);
        const taskId = checkbox.data('task-id');
        const isChecked = checkbox.is(':checked');

        // Adiciona ou remove o risco na descrição
        const description = checkbox.closest('.task').find('.task-description');
        if (isChecked) {
            description.addClass('done');
        } else {
            description.removeClass('done');
        }

        // Requisição AJAX para atualizar no banco
        $.ajax({
            url: 'actions/update-progress.php',
            method: 'POST',
            data: {
                id: taskId,
                completed: isChecked ? 'true' : 'false'
            },
            dataType: 'json',
            success: function (response) {
                if (!response.success) {
                    alert('Erro ao atualizar tarefa.');
                }
            },
            error: function () {
                alert('Erro na comunicação com o servidor.');
            }
        });
    });
});
