<?php
$orderData = $order->getOrderData();

$articleList = '';
foreach($orderData['positions'] as $article) {
	$articleList .= sprintf(
		'% -10s | % 6d | % 9.2f € | % 9.2f €' . "\n",
		htmlspecialchars(mb_substr($article->getName(), 0, 10)),
		$article->getQuantity(),
		$article->getPrice(),
		$article->getPrice() * $article->getQuantity()
	);
}

$user_title = $user->getTitle() == 'Herr' ? 'Sehr geehrter' : 'Sehr geehrte';
$user_name = htmlspecialchars($user->getName());
$user_bank = htmlspecialchars($user->getBank());
$user_bic = htmlspecialchars($user->getBic());
$user_iban = htmlspecialchars($user->getIban());
$user_street = htmlspecialchars($user->getStreet());
$user_zip = htmlspecialchars($user->getZip());
$user_city = htmlspecialchars($user->getCity());
    
$order_time = $orderData['ordertime']->format(DATE_FORMAT);

$price = $orderData['price'];
$p_articles = sprintf('% 9.2f €', $price['articles'], 2);
$p_shipping = sprintf('% 9.2f €', $price['shipping'], 2);
$p_total = sprintf('% 9.2f €', $price['total'], 2);

$mailText = <<<EOT
<pre>$user_title $user_name,

wir haben am $order_time folgende Bestellung von Ihnen entgegen genommen:

Artikel    | Anzahl | Einzelpreis | Gesamtpreis
———————————+————————+—————————————+————————————
$articleList
Summe Artikel:                      $p_articles
Verpackung & Versand:               $p_shipping
Preis gesamt:                       $p_total

Der Gesamtpreis wird von uns in den nächsten Tagen von folgendem Konto abgebucht:
  Bank: $user_bank
  BIC:  $user_bic
  IBAN: $user_iban

Sobald die Zahlung erfolgt ist, wird Ihre Bestellung von uns an folgende Adresse versandt:
  $user_street
  $user_zip $user_city

Herzliche Grüße,
Ihr Team von Gartenzwerge24.eu</pre>
EOT;

return $mailText;