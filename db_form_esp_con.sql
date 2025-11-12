use formulario;

CREATE TABLE `dados` (
  `id` int primary key auto_increment NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `classificacao` enum('dicente','docente', 'responsavel', 'outro') not null,
  `turma` enum('turma9A','turma9B', 'turma1A', 'turma1B', 'turma2A', 'turma2B', 'turma3A', 'outro') not null
  );

alter table dados modify column turma enum ('turma9A','turma9B', 'turma1A', 'turma1B', 'turma2A', 'turma2B', 'turma3A', 'outro') not null;

select * from dados;

/*UPDATE dados SET tipo = 'video', conteudo = 'teste1', ordem = 3 WHERE id = 35;*/

INSERT INTO dados (nome, data, classificacao, turma) VALUES ('Ana', '11/12/2010', 'dicente', 'turma9B');

drop table dados;
  
  