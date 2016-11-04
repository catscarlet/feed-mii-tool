<?php

class RECIPE
{
    public $name = 'name';
    public $value = 0b0000;
    public function echoName()
    {
        echo $this->name;
        echo "\n";
    }

    public function showIngredientInfo()
    {
        $value = $this->value;
        echo $value."\n";
    }
}

$recipe_file = file_get_contents('recipe.json');
$recipe_decode = json_decode($recipe_file, true);
$recipe_info_list = $recipe_decode['list'];

$recipe_class = array();

foreach ($recipe_info_list as $key => $recipe_info) {
    $recipe = $recipe_info['name'];
    $$recipe = new RECIPE();
    $$recipe->name = $recipe_info['name'];
    $$recipe->value = (int) base_convert($recipe_info['value'], 2, 10);
    $$recipe->ingredients_name = $recipe_info['ingredients_name'];
    $$recipe->image = $recipe_info['image'];
    $recipe_class[] = $$recipe;
}
