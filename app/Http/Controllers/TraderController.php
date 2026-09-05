<?php

namespace App\Http\Controllers;

use App\Http\Requests\TraderMemberAccountRequest;
use App\Models\TraderMemberAccount;

class TraderController extends Controller
{
    public function store(TraderMemberAccountRequest $request)
    {
        $validated = $request->validated();

        // Store verification document privately
        $documentPath = $request->file('verification_document')
            ->store('trader-documents');

        $validated['verification_document'] = $documentPath;

        // Create trader member account
        TraderMemberAccount::create($validated);

        return redirect()
            ->back()
            ->with('success', 'Trader application submitted successfully.');
    }
}