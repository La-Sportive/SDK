# La Sportive SDK

## Concept

La Sportive wants to help clubs by giving them cashback when customers buy articles.

This SDK is here to help you declare what customers successfully buy on your ecommerce website.

## Installation

`composer require La-Sportive/SDK '^0.1'`

## Using this SDK

First, when customer is redirected to your ecommerce website, a token will be provided to you through parameter session.
Save this token.
 
 ``` 
     <?php
     session_start();
     
     $_SESSION['laSportiveSession'] = $_GET['session']
 ```

First you need to initialize the component

``` 
    <?php
    $laSportiveCommunicator = new \LaSportive\SDK\Communicator()
    $laSportiveCommunicator->init()
```

And finally, when you have a confirmed transaction, you can send it to La Sportive service

``` 
    <?php
    session_start();
    
    $transaction = new \LaSportive\SDK\Entity\Transaction();
    
    // Some custom reference for your internal purpose
    $transaction->setExternalReference('REF12354');
    
    // A custom label
    $transaction->setLabel('Some running shoes');
    
    // The transaction amount in € with no coma. 10.50€ will be set as 1050€
    // So in this exemple this is a 75€ transaction
    $transaction->setLabel(7500);
    
    $laSportiveCommunicator->commitTransaction($_SESSION['laSportiveSession'], $transaction);
```

And that's all ! You will then find all your transactions and stats on La Sportive service.
