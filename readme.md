<!-- 01 - _construct():

Déclencheur : Cette méthode est automatiquement appelée lorsqu'un nouvel objet est créé à partir d'une classe. Elle est utilisée pour initialiser les propriétés de l'objet. -->

class ExampleClass {
    public function __construct() {
        echo "Méthode appelé";
    }
}
$exampleObject = new ExampleClass();

% 02 - __toString():

% Déclencheur : Cette méthode est automatiquement appelée lorsqu'un objet est utilisé comme une chaîne de caractères, par exemple lorsqu'il est passé à la fonction echo.

class ExampleClass {
    public function __toString() {
        return "OK";
    }
}
$exampleObject = new ExampleClass();
echo $exampleObject;

<!-- 03 - __get():

Déclencheur : Cette méthode est appelée lorsqu'on tente d'accéder à une propriété inaccessible dans un objet. -->

class ExampleClass {
    private $data = [
        'name' => 'John',
    ];

    public function __get($property) {
        if (array_key_exists($property, $this->data)) {
            return $this->data[$property];
        }
    }
}

$exampleObject = new ExampleClass();
echo $exampleObject->name;  //


<!-- 04 - __set():

Déclencheur : Cette méthode est appelée lorsqu'on tente d'affecter une valeur à une propriété inaccessible dans un objet. -->

class ExampleClass {
    private $data = [];

    public function __set($property, $value) {
        $this->data[$property] = $value;
    }
}
$exampleObject = new ExampleClass();
$exampleObject->name = "John";

<!-- 05 - __isset() :

Déclencheur : Cette méthode est déclenchée lorsque vous utilisez la fonction isset() pour vérifier l'existence d'une propriété inaccessible ou non définie d'un objet. -->

class ExampleClass {
    private $data = [
        'name' => 'John',
    ];

    public function __isset($property) {
        return isset($this->data[$property]);
    }
}
$exampleObject = new ExampleClass();
if (isset($exampleObject->name)) {
    echo "La propriété 'name' existe.";
}
