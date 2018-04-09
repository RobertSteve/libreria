new Vue({
    el: '#crudLibreria',
    created: function(){
        this.getLibros();
    },
    data: {
        libros:[],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from':0,
            'to':0
        },
        newTitulo:'',
        newAutor:'',
        newTema:'',
        fillLibro:{'id':'','titulo':'','autor':'','tema':''},
        errors:[],
        offset:3,
        buscar:''
    },
    computed: {
        isActived: function() {
            return this.pagination.current_page;
        },
        pagesNumber: function(){
            if(!this.pagination.to){
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if(from<1){
                from = 1;
            }
            var to = from + ( this.offset * 2 );
            if(to>= this.pagination.last_page){
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    methods: {
        getLibros: function(page){
            var url = 'libreria?buscar='+this.buscar+'&page='+page;
            axios.get(url).then(response => {
                this.libros = response.data.libreria.data;
                this.pagination = response.data.pagination;
            });
        },
        nuevoLibro: function(){
            $('#create').modal('show');
        },
        editarLibro: function(libro){
            this.fillLibro.id = libro.id;
            this.fillLibro.titulo = libro.titulo;
            this.fillLibro.autor = libro.autor;
            this.fillLibro.tema = libro.tema;
            $('#edit').modal('show');
        },
        actualizarLibro: function(id){
            var url = 'libreria/'+id;
            axios.put(url,this.fillLibro).then(response=>{
                this.getLibros();
                this.fillLibro = {'id':'','titulo':'','autor':'','tema':''};
                this.errors = [],
                $('#edit').modal('hide');
                toastr.success('Actualizado Correctamente')
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        eliminarLibro: function(id){
            var url = 'libreria/'+id;
            axios.delete(url).then(response => {
                this.getLibros();
                toastr.success('Se eliminó correctamente');
            });
        },
        crearLibro: function(){
            var url = 'libreria';
            axios.post(url,{
                titulo: this.newTitulo,
                autor: this.newAutor,
                tema:this.newTema
            }).then(response=>{
                this.getLibros();
                this.newTitulo = '';
                this.newAutor = '';
                this.newTema = '';
                this.errors = [];
                $('#create').modal('hide');
                toastr.success('Agregado correctamente');
            }).catch(error=>{
                this.errors = error.response.data
            });
        },
        cambiarPagina: function(page){
            this.pagination.current_page = page;
            this.getLibros(page);
        },
        buscarLibro: function(page){
            var url = 'libreria?buscar='+this.buscar+'&page='+page;
            axios.get(url).then(response => {
                this.libros = response.data.libreria.data;
                this.pagination = response.data.pagination;
            });
        }
    }
})