<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Acte de "{{ $deed->client }}"</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body{
                padding: 30px;
                font-family: sans-serif;
            }
            img{
                display: block;
                max-width: 100%;
                height: auto;
            }
            .flex{
                display: flex;
            }
            .items-center{
                align-items: center;
            }
            .justify-center{
                justify-content: center;
            }
            .justify-between{
                justify-content: space-between;
            }
            .bold{
                font-weight: bold;
            }
            .text-center{
                text-align: center;
            }
            .mb-2{
                margin-bottom: 0.5rem;
            }
            .mb-3{
                margin-bottom: 0.75rem;
            }
            .border-solid{
                border-style: solid;
            }
            .border-b{
                border-bottom-style: solid;
                border-bottom-width: 1px;
            }
            .border-gray-500{
                border-color: rgb(107, 114, 118)
            }
            .px-4{
                padding-left: 1rem;
                padding-right: 1rem;
            }
            .py-5{
                padding-top: 1.25rem;
                padding-bottom: 1.25rem;
            }
            .font-bold{
                font-weight: 600;
            }
            .underline{
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="flex justify-between mb-3">
            <div>
                <img src="{{ base_path() }}/public/images/logo.png" >
            </div>
        </div>
        <div class="text-center">
            <h1 class="underline">Acte {{ $deed->client }}</h1>
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Client</span>: {{ $deed->client }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Code Client</span>: {{ $deed->client_code }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Date réception demande</span>: {{ optional($deed->date_of_receipt_of_the_request)->format('d/m/Y') }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Notaire</span>: {{ $deed->notary }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Correspondant Notaire</span>: {{ $deed->correspondaent_of_the_notary }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Objet du crédit</span>: {{ $deed->purpose_of_the_credit }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Référence de la décision de crédit</span>: {{ $deed->reference_of_credit_decision }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Pôle</span>: {{ optional($deed->pole)->name }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Agence</span>: {{ optional($deed->agency)->name }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Garantie</span>: {{ optional($deed->warranty)->name }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Types de demande</span>: {{ optional($deed->typeOfRequests)->implode('name', ', ') }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Référence avis d'imposition</span>: {{ $deed->tax_notice_reference }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Avis de débit notifié au client?</span>: {{ $deed->debit_advice_notified }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Documentation physique</span>: {{ $deed->documentation }}
        </div>
        @if (optional($deed->typeOfRequests)->contains($typesOfRequests->firstWhere('name', 'Rédaction')->id))
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Date de complétude(rédaction)</span>: {{ optional($deed->writting_completion_date)->format('d/m/Y') }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Date fin rédaction</span>: {{ optional($deed->writting_end_date)->format('d/m/Y') }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Date signature</span>: {{ optional($deed->signature_date)->format('d/m/Y') }}
        </div>
        @endif
        @if (optional($deed->typeOfRequests)->contains($typesOfRequests->firstWhere('name', 'Inscription')->id))
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Date complétude dossier</span>: {{ optional($deed->file_completion_date)->format('d/m/Y') }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Date dépôt dossier</span>: {{ optional($deed->filing_date)->format('d/m/Y') }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Date de retrait</span>: {{ optional($deed->file_withdrawal_date)->format('d/m/Y') }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Date de transmission au BO Garanties</span>: {{ optional($deed->date_of_transmission_to_the_BO)->format('d/m/Y') }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Montant de l'inscription</span>: {{ number_format($deed->registration_amount, 0, '.', ' ') . " FCFA" }}
        </div>
        @endif
        @if (optional($deed->typeOfRequests)->contains($typesOfRequests->firstWhere('name', 'Enregistrement')->id))
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Date d'envoi(enregistrement)</span>: {{ optional($deed->registration_sending_date)->format('d/m/Y') }}
        </div>
        <div class="px-4 py-5 border-b border-gray-500">
            <span class="font-bold">Date de retour</span>: {{ optional($deed->registration_return_date)->format('d/m/Y') }}
        </div>
        <div class="px-4 py-5 border-b">
            <span class="font-bold">Montant(Enregistrement)</span>: {{ number_format($deed->registration_amount, 0, '.', ' ') . " FCFA" }}
        </div>
        @endif
        <script type="text/php">
            if(isset($pdf)){
                        $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
                        $size = 10;
                        $font = $fontMetrics->getFont("Verdana");
                        $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                        $x = ($pdf->get_width() - $width);
                        $y = ($pdf->get_height() - 30);
                        $pdf->page_text($x, $y, $text, $font, $size);
                    }
        </script>
    </body>
</html>
