Nesse desafio vamos criar um sistema de gerenciamento de tarefas a fazer (TO DO List) usando PHP (Session) + Bootstrap.

O Sistema deve ter 2 telas, sendo elas uma tela de listagem conforme imagem abaixo…

![Untitled](https://prod-files-secure.s3.us-west-2.amazonaws.com/881b537a-544c-40a9-8088-b11c1ec4cb8d/e7d4b277-2941-40e4-bfaa-c1a305ea6f85/Untitled.png)

E uma tela de cadastro de tarefas, conforme imagem abaixo…

![Untitled](https://prod-files-secure.s3.us-west-2.amazonaws.com/881b537a-544c-40a9-8088-b11c1ec4cb8d/7a005c2c-025c-41c5-b6ae-6f72bb773a25/Untitled.png)

## **Requisitos funcionais**

1. Após cadastrar uma tarefa o usuário deve receber um alerta informando que a sua tarefa foi cadastrada

![Untitled](https://prod-files-secure.s3.us-west-2.amazonaws.com/881b537a-544c-40a9-8088-b11c1ec4cb8d/0b5afaf2-5dcb-40c5-bd63-19d22fea2b79/Untitled.png)

1. Ao clicar em excluir, o sistema deve exibir uma mensagem informando que a tarefa foi excluída

![Untitled](https://prod-files-secure.s3.us-west-2.amazonaws.com/881b537a-544c-40a9-8088-b11c1ec4cb8d/bca28af9-93e1-4ea0-99cc-b1886901a28b/Untitled.png)

1. Deve haver uma rotina de validação…
- Não deve ser possível cadastrar tarefas sem título
- Não deve ser possível cadastrar tarefas sem data
- Não deve ser possível cadastrar tarefas com títulos com menos de 5 caracteres
- Não deve ser possível cadastrar uma **data no passado** (para essa validação estude sobre datas no PHP https://www.php.net/manual/pt_BR/function.date.php).

![Untitled](https://prod-files-secure.s3.us-west-2.amazonaws.com/881b537a-544c-40a9-8088-b11c1ec4cb8d/330a3ac2-9a01-45ed-9779-50ad39289ba5/Untitled.png)

1. Todas as tarefas devem ser armazenadas na SESSION do PHP