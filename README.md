# CI_PageConstructor v0.3
Codeigniter Library to construct frontend with integrated support for
- [x] Bootstrap 4.0A
- [x] jQuery
- [x] Font Awesome 5
- [x] Animate CSS
- [x] optional directory based css loading
- [x] optional js run file
- [ ] Favicon
- [ ] Meta / Page title

## Easy integration:
Composer: will be coming soon..


manual:
1. Copy the PageConstructor.php to `/application/libraries/`
2. load PC to CI whit auto or manual method.
3. Optional edit the settings/switches in the PageConstructor as you need.
4. Construct your HTML header with `$this->PC->HEAD();`
5. Construct your Footer with `$this->PC->FOOTER(); ` to the end of your content.

* Now your frontend contains all nessesery files to use bootstrap 4 &

## Manual Load to CodeIgniter
implement the CodeIgniterigniter standard library load method in the `__construct` or in the `function`.
Example:
```
$this->load->library('PageConstructor' => 'PC');
```

## AutoLoad to CodeIgniter
change in `/application/config/autoload.php` around line 61..
``` $autoload['libraries'] = array(); ```
To
``` $autoload['libraries'] = array('PageConstructor' => 'PC'); ```

now you can use PC as an object ready to generate the frontend boring part :)

### Example
if the PageConstructor is loaded with AutoLoader
#### Controller
```
class Home extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->PC->HEAD();
    }

    public function index() {



        if($this->uri->segment(1) != NULL && $this->uri->segment(2) != NULL){

            $data["loadThisView"] = $this->uri->segment(1)."/".$this->uri->segment(2);
            $this->load->view('template.php', $data);

        }else{
            $this->load->view('main.php');
        }
    }
}
```

#### The main.php or the Template.php:
```
<?php
if(isset($loadThisView)){
  $this->load->view($loadThisView);
}else {
    echo '<pre>content not loaded, error</pre>';
}
$this->PC->FOOTER();
?>
```
