<h1>Nouvelle demande de rappel</h1>

<p>Bonjour Admin, <br>vous avez reçu une nouvelle demande de rappel de la part de {{ $callback->contact_name }}.</p>

<p>Voici les informations de la demande de rappel :</p>

<p>ID : {{ $callback->id }}</p>
<p>Nom : {{ $callback->contact_name }}</p>
<p>Téléphone : {{ $callback->contact_phone }}</p>
<p>Email : {{ $callback->contact_email }}</p>
<p>Message : {{ $callback->message }}</p>
<p>Disponible le matin : {{ $callback->available_morning ? 'Oui' : 'Non' }}</p>
<p>Disponible le jour : {{ $callback->available_daytime ? 'Oui' : 'Non' }}</p>
<p>Disponible le soir : {{ $callback->available_evening ? 'Oui' : 'Non' }}</p>

<p>Cordialement,</p>

<p>ExploraBot</p>
