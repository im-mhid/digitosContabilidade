# digitosContabilidade

# 1. Rodando o Projeto

1. Baixe o xampp.
2. Clone o repositório na pasta htdocs, dentro do xampp.
3. Inicie os módulos Apache e MySQL do xampp.
4. Acesse localhost/phpmyadmin e crie o banco de dados.
5. Comandos para criar o banco de dados:
   5.1. CREATE database contabilidade;
   5.2. CREATE TABLE tipo_doc ( cod_tipo_doc INT PRIMARY KEY AUTO_INCREMENT, tipo_doc VARCHAR(255), temp_arquivamento INT );
6. No seu navegador, digite o caminho para a pasta que deseja acessar, considerando htdocs como a pasta inicial (essa, que terá o nome localhost. Ex.: http://localhost/digitoscontabilidade/screens/tipoDocumento.php)

# 2. Avisos:

1. Somente a página tipoDocumento.php possui alguma estrutura.
2. Com o crescimento do projeto, é mais vantajoso e seguro utilizar laravel para sua construção.
