<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


# API
### Usuário
-> Retorna todos os usuários

    link: {base_url}/api/users
    method: GET
    header: 
        Content-Type : Content-Type
        Accept: application/json
    return: 
        [
          {
            "id": 1,
            "name": "Usuario 1",
            "cep": "17500020",
            "number": "277"
          },
          {
            "id": 2,
            "name": "Usuario 2",
            "cep": "17500020",
            "number": "123"
          }
        ]
        
-> Retorna um usuário

    link: {base_url}/api/users/{id}
    method: GET
    header: 
        Content-Type : Content-Type
        Accept: application/json
    return :
    {
      "id": 2,
      "name": "Usuario 2",
      "cep": "17500020",
      "number": "123"
    }
    
-> Grava um usuário

    link: {base_url}/api/users
    method: POST
    header: 
        Content-Type : Content-Type
        Accept: application/json
    send: 
        {
            "name" : "Usuario 3",
            "cep" : "17500000",
            "number": "123"
        }
    return:
        {
          "id": 3,
          "name": "Usuario 3",
          "cep": "17500000",
          "number": "123"
        }
        
-> Atualiza um usuário

    link: {base_url}/api/users/{id}
    method: PUT
    header: 
        Content-Type : Content-Type
        Accept: application/json
    send: 
        {
            "name" : "Usuario 33",
            "cep" : "17500000",
            "number": "111"
        }
    return:
        {
          "id": 3,
          "name": "Usuario 33",
          "cep": "17500000",
          "number": "111"
        }
        
-> Exclui um usuário

    link: {base_url}/api/users/{id}
    method: DELETE
    header: 
        Content-Type : Content-Type
        Accept: application/json
    return: {}
    
 -> Padrão de retorno de erro
    
    {
      "title": "Erro",
      "msg": "mensagem de erro"
    }

### Pet
-> Retorna todos os Pets

    link: {base_url}/api/pets
    method: GET
    header: 
        Content-Type : Content-Type
        Accept: application/json
    return: 
        [
       [
          {
            "id": 1,
            "name": "Rex",
            "descricao": "Husky siberiano",
            "age": 5,
            "user": {
              "id": 1,
              "name": "Usuario 1",
              "cep": "17500020",
              "number": "277"
            }
          },
          {
            "id": 2,
            "name": "Thor",
            "descricao": "Pitbull",
            "age": 8,
            "user": {
              "id": 2,
              "name": "Usuario 2",
              "cep": "17500000",
              "number": "123"
            }
          }
        ]



