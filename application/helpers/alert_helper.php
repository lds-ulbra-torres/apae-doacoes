<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function CreateEntityAlert($entityName, $params) {
  $message = "Um(a) ". $entityName . " foi criado(a) com a identificação ". $params;
  return createAlert($message, "alert-success");
}

function DeleteEntityAlert($entityName, $params) {
  $message = "Um(a) ". $entityName . " foi apagado(a) com a identificação ". $params;
  return createAlert($message, "alert-warning");
}

function UpdateEntityAlert($entityName, $params) {
  $message = "Um(a) ". $entityName . " foi alterado(a) com a identificação ". $params;
  return createAlert($message, "alert-success");
}

function CreateErrorAlert($errorMessage, $params) {
  $message = "Ocorreu um erro de ". $errorMessage;
  return createAlert($message, "alert-danger");
}

function createAlert($message, $type) {
  $alert = "<div class='alert ". $type ." alert-dismissible' role='alert'>"
              ."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"
              . $message
          ."</div>";
  return $alert;
}
