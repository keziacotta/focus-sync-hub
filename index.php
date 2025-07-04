
<?php
require_once('database/conn.php'); // conexão com o banco

try {
    $stmt = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar tarefas: " . $e->getMessage();
    $tasks = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FocusSync Hub</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="src/styles/style-general.css" />
  <link rel="stylesheet" href="src/styles/style-tasks.css" />
  <link rel="stylesheet" href="src/styles/style-pomodoro.css" />
</head>
<body>
  <h1 style="font-size: 3em; text-align: center;">Focus Sync Hub</h1>

  <div class="dashboard-grid"> 
    <!-- TAREFAS -->
    <div class="tasks-wrapper">
      <div id="to-do">
        <h1>Minhas tarefas</h1>
        <form action="actions/create.php" method="POST" class="to-do-form">
          <input type="text" name="description" placeholder="Escreva sua tarefa aqui" required />
          <button type="submit" class="form-button">
            <i class="fa-solid fa-plus"></i>
          </button>
        </form>

        <div id="tasks">
          <?php foreach ($tasks as $task): ?>
            <div class="task">
              <input 
                type="checkbox" 
                name="progress" 
                class="progress"
                data-task-id="<?= $task['id'] ?>"
                <?= $task['completed'] ? 'checked' : '' ?>
              >
              <p class="task-description <?= $task['completed'] ? 'done' : '' ?>">
                <?= htmlspecialchars($task['description']) ?>
              </p>

              <div class="task-actions">
                <a class="action-button edit-button">
                  <i class="fa-regular fa-pen-to-square"></i>
                </a>
                <a href="actions/delete.php?id=<?= $task['id'] ?>" class="action-button delete-button">
                  <i class="fa-regular fa-trash-can"></i>
                </a>
              </div>

              <form action="actions/update.php" method="POST" class="to-do-form edit-task hidden">
                <input type="hidden" name="id" value="<?= $task['id'] ?>" />
                <input 
                  type="text" 
                  name="description" 
                  placeholder="Edite sua tarefa aqui" 
                  value="<?= htmlspecialchars($task['description']) ?>" 
                />
                <button type="submit" class="form-button confirm-button">
                  <i class="fa-solid fa-check"></i>
                </button>
              </form>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- POMODORO + YOUTUBE -->
    <div class="right-column">
      <div class="timer-wrapper">
        <div class="container">
          <div class="timer">
            <h1>Cronômetro Pomodoro</h1>
            <div class="button-container">
              <button class="button" id="pomodoro-session">Pomodoro</button>
              <button class="button" id="short-break">Pausa Curta</button>
              <button class="button" id="long-break">Pausa Longa</button>
            </div>
            <main>
              <div class="pomodoro">
                <div id="pomodoro-timer" class="timer-display" data-duration="25.00"><h1 class="time">25:00</h1></div>
                <div id="short-timer" class="timer-display" data-duration="5.00"><h1 class="time">5:00</h1></div>
                <div id="long-timer" class="timer-display" data-duration="10.00"><h1 class="time">10:00</h1></div>
              </div>
            </main>
            <div class="buttons">
              <button id="start">INICIAR</button>
              <button id="stop">PARAR</button>
              <button id="restart">REINICIAR</button>
            </div>
          </div>
        </div>
      </div>

      <div class="youtube-wrapper">
        <div class="video-container">
          <iframe
            src="https://www.youtube.com/embed/Vxrg4jKhZYM?si=-q9chHATgZ2-8UN7"
            title="YouTube player"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen>
          </iframe>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="src/javascript/script-pomodoro.js"></script>
  <script src="src/javascript/script-tasks.js"></script>
</body>
</html>