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
        <h1>Rapport des achats</h1>
        <p>Ordonné par la date de réalisation</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Achat ID</th>
                <th>Nom de fournisseur</th>
                <th>Nom de produit</th>
                <th>Quantité</th>
                <th>Prix Total</th>
                <th>Date d'achat</th>
                <th>Date de Modification</th>
            </tr>
        </thead>
        <tbody>
            @foreach($achats as $achat)
                <tr>
                    <td>{{ $achat->id }}</td>
                    <td>{{ $achat->nom_fournisseur }}</td>
                    <td>{{ $achat->nom_produit }}</td>
                    <td>{{ $achat->nombre_produits }}</td>
                    <td>{{ $achat->prix_total }}</td>
                    <td>{{ $achat->created_at }}</td>
                    <td>{{ $achat->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: right;">Total de Coût:</td>
                <td colspan="3" style="text-align: left;">{{ $totalCost }}</td>
            </tr>
        </tfoot>
    </table>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Votre Société</p>
    </div>
</body>
</html>
