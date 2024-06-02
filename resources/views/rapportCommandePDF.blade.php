<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            width: 100px;
            height: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .footer {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('images/pdfLogo.jpeg') }}" class="logo" alt="Logo">
        <h1>Rapport de commandes</h1>
        <p>Ordonné par la date de réalisation</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Commande ID</th>
                <th>Nom de client</th>
                <th>Nom de produit</th>
                <th>Quantité</th>
                <th>Prix Total</th>
                <th>Date de commande</th>
                <th>Date de Modification</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->nom_client }}</td>
                    <td>{{ $commande->nom_produit }}</td>
                    <td>{{ $commande->nombre_produits }}</td>
                    <td>{{ $commande->prix_total }}</td>
                    <td>{{ $commande->created_at }}</td>
                    <td>{{ $commande->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: right;">Total de Profit:</td>
                <td colspan="3" style="text-align: left;">{{ $totalProfit }}</td>
            </tr>
        </tfoot>
    </table>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Gestion de pharmacie</p>
    </div>
</body>
</html>
