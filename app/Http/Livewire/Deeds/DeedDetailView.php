<?php

namespace App\Http\Livewire\Deeds;

use App\Models\Deed;
use App\Models\TypeOfRequest;
use LaravelViews\Views\DetailView;
use LaravelViews\Actions\RedirectAction;

class DeedDetailView extends DetailView
{

    public function heading($model)
    {
        return [
            "Fiche détaillée de '{$model->client}'",
            "Informations complètes sur l'acte '{$model->purpose_of_the_credit}'",
        ];
    }

    /**
     * @param $model Model instance
     * @return Array Array with all the detail data or the components
     */
    public function detail(Deed $model)
    {
        $typesOfRequests = TypeOfRequest::all();
        $data =  [
            'Code Client' => $model->client_code,
            'Client' => $model->client,
            'Date réception demande' => optional($model->date_of_receipt_of_the_request)->format('d/m/Y'),
            'Notaire' => $model->notary,
            'Correspondant Notaire' => $model->correspondaent_of_the_notary,
            'Objet du crédit' => $model->purpose_of_the_credit,
            'Référence de la décision de crédit' => $model->reference_of_credit_decision,
            'Pôle' => optional($model->pole)->name,
            'Agence' => optional($model->agency)->name,
            'Garantie' => optional($model->warranty)->name,
            'Types de demande' => optional($model->typeOfRequests)->implode('name', ', '),
            'Référence avis d\'imposition' => $model->tax_notice_reference,
            'Avis de débit notifié au client?' => $model->debit_advice_notified,
            'Documentation physique' => $model->documentation,
        ];
        if (optional($model->typeOfRequests)->contains($typesOfRequests->firstWhere('name', 'Inscription')->id)) {
            $data['Date complétude dossier']             = optional($model->file_completion_date)->format('d/m/Y');
            $data['Date dépôt dossier']                  = optional($model->filing_date)->format('d/m/Y');
            $data['Date de retrait']                     = optional($model->file_withdrawal_date)->format('d/m/Y');
            $data['Date de transmission au BO Garanties'] = optional($model->date_of_transmission_to_the_BO)->format('d/m/Y');
            $data['Montant de l\'inscription']           = number_format($model->registration_amount, 0, '.', ' ') . " FCFA";
        }

        if (optional($model->typeOfRequests)->contains($typesOfRequests->firstWhere('name', 'Rédaction')->id)) {
            $data['Date de complétude(rédaction)'] = optional($model->writting_completion_date)->format('d/m/Y');
            $data['Date fin rédaction']            = optional($model->writting_end_date)->format('d/m/Y');
            $data['Date signature']                = optional($model->signature_date)->format('d/m/Y');
        }

        if (optional($model->typeOfRequests)->contains($typesOfRequests->firstWhere('name', 'Enregistrement')->id)) {
            $data['Date d\'envoi(enregistrement)'] = optional($model->registration_sending_date)->format('d/m/Y');
            $data['Date de retour']                = optional($model->registration_return_date)->format('d/m/Y');
            $data['Montant(Enregistrement)']       = number_format($model->registration_amount, 0, '.', ' ') . " FCFA";
        }

        $files = $model->getMedia();
        $res = "";
        foreach ($files as $file) {
            $link = $file->getUrl();
            $res .= "<a target='_blank' class='underline text-indigo-500' href='$link'>$file->name</a>, ";
        }

        $data['Bordereau de Transmission'] = $res;

        return $data;
    }

    public function actions()
    {
        return [
            new RedirectAction('admin.deeds.edit', 'Modifier', 'edit'),
        ];
    }
}
