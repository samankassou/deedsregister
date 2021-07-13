<?php

namespace App\Http\Livewire\Deeds;

use App\Models\Deed;
use App\Actions\DeleteDeedAction;
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
        return [
            'Code Client' => $model->client_code,
            'Client' => $model->client,
            'Date réception demande' => $model->date_of_receipt_of_the_request->format('d/m/Y'),
            'Notaire' => $model->notary,
            'Correspondant Notaire' => $model->correspondaent_of_the_notary,
            'Objet du crédit' => $model->purpose_of_the_credit,
            'Référence de la décision de crédit' => $model->reference_of_credit_decision,
        ];
    }

    public function actions()
    {
        return [
            new RedirectAction('admin.deeds.edit', 'Modifier', 'edit'),
            new DeleteDeedAction,
        ];
    }
}
