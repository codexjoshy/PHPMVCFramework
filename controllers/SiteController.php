<?php

namespace app\controllers;

use app\core\Application;
use app\core\base\BaseController;
use app\core\Request;
use app\core\Response;
use app\models\forms\ContactForm;

/**
 * 
 * @package app\controllers
 */
class SiteController extends BaseController
{
 public function home()
 {
  return $this->render('home');
 }
 public function contact()
 {
  $contactForm = new ContactForm;
  $params = [
   "model" => $contactForm
  ];
  return $this->render('contact', $params);
 }
 public  function handleContact(Request $request, Response $response)
 {
  $contactForm = new ContactForm;
  $contactForm->loadData($request->all());
  if ($contactForm->validate() && $contactForm->send()) {
   return $response->redirect('/contact')->with('success', 'Thanks for contacting us');
  }
  return $this->render('contact', ["model" => $contactForm]);
 }
}