<?php

Class extension_client_logo extends Extension{

    public function about(){
        return array('name' => 'Client logo',
            'version' => '1.1.1',
            'release-date' => '2012-05-03',
            'author' => array(
                array('name' => 'Adam Fox',
                    'website' => 'http://adamfox.info',
                    'email' => 'fox@hairb.us'),
                array('name' => 'BBOX',
                    'website' => 'http://www.bbox.it',
                    'email' => 'nany@bbox.it')
                )
            );
    }


    public function getSubscribedDelegates() {
        return array(
            array(
                'page'		=> '/backend/',
                'delegate'	=> 'InitaliseAdminPageHead',
                'callback'	=> 'initaliseAdminPageHead'
            ),

            array(
                'page' => '/system/preferences/',
                'delegate' => 'AddCustomPreferenceFieldsets',
                'callback' => 'appendPreferences'
            ),	

            array(

                'page' => '/system/preferences/',
                'delegate' => 'Save',
                'callback' => 'savePreferences'

            ),
        );
    }

    public function uninstall(){
        Administration::instance()->Configuration->remove('client_logo');            
        Administration::instance()->saveConfig();
    }


    //aggiungo il logo
    public function initaliseAdminPageHead($context) {
        $page = $context['parent']->Page;
        $pathlogo = General::Sanitize(Administration::instance()->Configuration->get('path', 'client_logo'));						
        if($pathlogo != "" and file_exists(DOCROOT.'/workspace/'.$pathlogo)) {
            //controllo l'esistenza e le misure del logo
            $page->addElementToHead(new XMLElement("style", "
                body #wrapper #header h1 {
                    position: relative;
                    padding: 10px 19px;
                }
                body #wrapper #header h1 a {
                    display: block;
                    height: 70px;
                    background: url(" .URL.'/image/2/0/70/5/'.$pathlogo . ") no-repeat;
                    text-indent:-1000px;
                }",
                array(
                    "type" => "text/css",
                    "media" => "screen, projection")
                ), 
                100012);
        }
    }

    //salvo le preferenze
    public function savePreferences($context){
        $pathlogo = $context['settings']['client_logo']['path'];
        if(file_exists(DOCROOT.'/workspace/'.$pathlogo)) {
            $context['settings']['client_logo'] = array("path" =>$pathlogo);
        }
    }


    //imposto le preferenze
    public function appendPreferences($context){

        $group = new XMLElement('fieldset');
        $group->setAttribute('class', 'settings');
        $group->appendChild(
            new XMLElement('legend', 'Client logo')
        );

        $pathlogo = Widget::Label(__('Client logo path (relative to workspace)'));
        $pathlogo->appendChild(Widget::Input(
            'settings[client_logo][path]', General::Sanitize(Administration::instance()->Configuration->get('path', 'client_logo'))
        ));
        $group->appendChild($pathlogo);

        $context['wrapper']->appendChild($group);			

    }

}

?>
