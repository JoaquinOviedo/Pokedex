<?php
    class PokemonController
    {
        private $model;
        private $presenter;

        public function __construct($model, $presenter)
        {
            $this->model = $model;
            $this->presenter = $presenter;
        }

        public function get()
        {
            $pokemones = $this -> model -> getAllPokemon();
            $this -> presenter -> render("view/pokemonList.mustache", ["pokemones" => $pokemones]);
        }

        public function delete(){

        }

        public function add(){
            $pokemonId = $_POST["id"];
            $pokemonNombre = $_POST["nombre"];
            $pokemonTipo = $_POST["tipo"];
            $pokemonDescripcion = $_POST["descripcion"];
            $this -> model -> addPokemon($pokemonId, $pokemonNombre, $pokemonTipo, $pokemonDescripcion);
            header("location:/pokemones");
            exit();
        }

        public function addView(){
            $this->presenter->render("view/pokemonFormulario.mustache");
        }
    }
?>
