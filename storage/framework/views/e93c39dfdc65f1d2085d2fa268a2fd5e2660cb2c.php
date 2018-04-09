<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Libreria | CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body>
    <div id="crudLibreria" class="container">
        <div class="d-flex justify-content-end my-2">
            <button type="button" class="btn btn-link btn-sm" v-on:click.prevent="nuevoLibro()">Nuevo</button>
        </div>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Buscar</span>
            </div>
            <input type="text" class="form-control" placeholder="Buscar" v-model="buscar" @keyup="buscarLibro()">
        </div>
        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Tema</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="libro in libros">
                    <td>{{ libro.titulo }}</td>
                    <td>{{ libro.autor }}</td>
                    <td>{{ libro.tema }}</td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm" v-on:click.prevent="editarLibro(libro)">Editar</button>
                        <button type="button" class="btn btn-link btn-sm" v-on:click.prevent="eliminarLibro(libro.id)">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <nav class="d-flex justify-content-center">
            <ul class="pagination pagination-sm">
                <li v-if="pagination.current_page > 1">
                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1)">Atrás</a>
                </li>
                <li class="page-item" v-for="page in pagesNumber" v-bind:class="[page == isActived ? 'active' : '']">
                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page)">{{ page }}</a>
                </li>
                <li v-if="pagination.current_page < pagination.last_page">
                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1)">Siguiente</a>
                </li>
            </ul>
        </nav>
        <?php echo $__env->make('create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>