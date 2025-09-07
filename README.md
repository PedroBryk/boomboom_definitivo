# Boom Boom - Sistema de Gerenciamento de Academia (Parte 2)

Este projeto é a continuação do **Boom Boom**, um sistema de gerenciamento para academias.  
Nesta segunda parte, foram adicionadas novas funcionalidades importantes para expandir e organizar o sistema.

## 🔧 Funcionalidades Implementadas
- **CRUD completo** com retorno em **JSON**, permitindo testes via **rotas de API** no Postman:
  - Controllers de **Aluno**
  - Controllers de **Professor**
- **Autenticação com Laravel Breeze**, configurada para integrar com diferentes migrations de usuários:
  - **Alunos**
  - **Professores**
  - **Administradores**
- **Validação dos dados de entrada** para garantir consistência e segurança.
- **Testes unitários implementados**:
  - Criação de um aluno
  - Exibição de um professor

## 🚀 Tecnologias Utilizadas
- **Laravel 10**
- **Laravel Breeze** (autenticação)
- **MySQL** (banco de dados)
- **Postman** (testes de API)
- **PHPUnit** (testes unitários)
