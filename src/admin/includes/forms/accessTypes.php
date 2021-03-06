<?php

$form = formBuilder::createForm('accessTypes');
$form->linkToDatabase(array(
    'table'       => 'accessTypes',
    'order'       => 'name'
));

$form->insertTitle = "New Access Types";
$form->editTitle   = "Edit Access Types";


$form->addField(
    array(
        'name'            => 'ID',
        'primary'         => TRUE,
        'showIn'          => array(formBuilder::TYPE_INSERT, formBuilder::TYPE_UPDATE),
        'type'            => 'hidden'
    )
);

$form->addField(
    array(
        'name'  => 'name',
        'label' => 'Access Type',
        'required'   => TRUE,
        'duplicates' => FALSE
    )
);

$form->addField(
    array(
        'name'  => "assignedTo",
        'label' => "Assigned to",
        'type' => "plaintext",
        'value' => '<a href="list/?id={ID}">Assigned to</a>',
        'showIn' => array(formBuilder::TYPE_EDIT),
        )
);

?>