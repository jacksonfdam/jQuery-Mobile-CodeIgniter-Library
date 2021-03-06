## CodeIgniter jQuery Mobile Library

Libreria para el desarrollo de versiones móviles de páginas con el framework
jQuery Mobile.

```
public function index()
{
	if($this->agent->is_mobile())
	{
		$this->mobile->header('Welcome to CodeIgniter!', 'e')->button('welcome/help', 'Help', 'info');

		$this->mobile->navbar(array(
			'welcome/index' 	=> array('text' => 'Home', 		'icon' => 'home'),
			'welcome/settings'	=> array('text' => 'Settings', 	'icon' => 'gear')
		), 'a');

		$this->mobile->footer('Footer', 'a');

		$this->mobile->view('welcome_message');
	}
}
```

## Métodos

### $this->mobile->header(*$title, $theme*)

Crea una barra horizontal con el título como primer primer argumento y, como 
segundo argumento (opcional) uno de los temas disponibles desde jQuery Mobile.
Será una letra desde a-e. Para definir un tema global, lo podemos hacer dentro
del archivo de configuración. Además, si queremos que la barra mantenga una 
posición estática y se desplace con la página, podemos definirlo dentro del 
archivo de configuración con `$config['mobile']['fixed_toolbars'] = TRUE;`

### $this->mobile->header( … )->back_to(*$url, $text*)

Éste método debe ir encadenado al de `header()` para que funcione. Crea un botón 
en la zona izquierda de la barra horizontal con un enlace a la página que 
indiquemos, realizando un deslizamiento hacia atrás. Por defecto, jQuery 
Mobile crea botones hacia atrás de forma automática. Si queremos establecer 
los nuestros, debemos hacerlo de esta forma y desactivar la opción de 
`$config['mobile']['backbtn_auto'] = FALSE;` dentro del archivo de configuración.

### $this->mobile->header( … )->button(*$url, $text, $icon*)

Nuevamente, este método debe ir encadenado al de `header()`. Tambien se puede 
hacer un encadenamiento doble entre `$this->mobile->header( … )->back_to( … )->button( … )`. 
Este último, crea un botón en la zona derecha de la barra de navegación. 
Como tercer argumento *(opcional)* podemos definir uno de los [iconos 
preestablecidos dentro de jQuery Mobile](http://jquerymobile.com/demos/1.0b2/#/demos/1.0b2/docs/buttons/buttons-icons.html).

### $this->mobile->navbar(*$links = array( ), $theme*)

Justo por debajo de la barra superior de navegación, podemos crear otra 
auxiliar con diversos botones. Para ello, debemos crear una array con la url 
como key y el texto del enlace como value. Es decir `$links['welcome/index'] = ‘Home’`,
por ejemplo. jQuery Mobile ya se encarga de dividir automáticamente este barra 
en tantas partes como valores tenga la barra de navegación. Si queremos que el
texto lleve un icono, podemos crear una array compuesta especificando el texto y
el icono que queremos. Es decir, el ejemplo anterior con icono seria: 
`$links['welcome/index'] = array('text' => 'Home', 'icon' => 'home');`. Como 
segundo argumento del método `navbar()`, podemos establecer un tema individual 
para ésta.

### $this->mobile->footer(*$title, $theme*)

Funciona exactamente igual que la barra de header, pero creando una barra de 
navegación en la parte inferior de la página. De la misma forma que la barra 
de header, tambien podemos establecer la posición estática de la barra footer
dentro del archivo de configuración.

### $this->mobile->view(*$view, $data = array()*)

Para su funcionamiento, esta libreria dispone de un archivo de plantilla con 
la base de la estructura de la página. Esto significa que no tenemos que 
crear de forma individual la cabecera de cada página y solo existe una 
versión de ésta. Por lo tanto, lo único que tenemos que cargar en la vista 
es **el contenido de la página que queremos ver**. El funcionamiento de este 
método es exactamente igual que el de CodeIgniter `$this->load->view( … )`
y acepta los mismos parámetros.

## Funciones

A parte de los métodos básicos de la libreria, se han definido algunas 
funciones auxiliares que ayudan en el desarrollo de las páginas gracias a 
jQuery Mobile.

#### link_to(*$url, $title, $attr = array(), $transition*)

Funciona exactamente igual que la función `anchor()` de CodeIgniter pero, 
acepta como último parametro la transición que queremos hacer para la 
siguiente página `(‘slide’, ‘slideup’, ‘slidedown’, ‘pop’, ‘fade’, ‘flip’)`. 
Dentro del archivo de configuración, podemos definir una transición general 
para todas las que se hagan (tambien se aplicará en los métodos de `back_to()`
y `button()`. Además, las transiciones se realizarán unicamente si tenemos 
la opción de cargar por AJAX activada.

### mail_to(*$email, $text*)

Crea un enlace para enviar un email a la dirección que especifiquemos como 
primer argumento. Como resultado, aparecerá un enlace con la dirección de 
email. Si lo queremos, podemos definir un texto alternativo para no mostrar 
la dirección de email directamente como segundo argumento.

### text_field(*$name, $text, $placeholder*)

Esta función se tiene que utilizar dentro de los formularios. Simplemente 
crea un contenedor de formulario tal como establece jQuery Mobile. Los 
argumentos a utilizar son el nombre `name` que se utilizará dentro del campo 
input, el texto que queremos que acompañe a nuestro campo como label 
(opcional) y, por último, el texto *placeholder* que queremos que aparezca 
dentro del campo (opcional).

### pass_field(*$name, $text, $placeholder*)

Funciona exactamente igual que la función anterior `text_field()`, pero en 
lugar de crear un campo de texto para los formularios, crea un campo para 
contraseñas.