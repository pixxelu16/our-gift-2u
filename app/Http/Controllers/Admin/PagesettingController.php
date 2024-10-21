<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pagesetting;
use Illuminate\Support\Facades\Storage;

class PagesettingController extends Controller
{
    public function index()
    {
        $pagesetting = Pagesetting::first();
        return view('admin.pages-setting.index', compact('pagesetting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'pdf' => 'required|file|mimes:pdf',
            'pdf_type' => 'required|string|max:255',
        ]);

        // Get the first record or create a new one
        $pagesetting = Pagesetting::where('pdf_type',$request->pdf_type)->first();

        // Check if the record exists
        if ($pagesetting) {
            if ($request->pdf_type !== $pagesetting->pdf_type) {
                $pagesetting = new Pagesetting;
            }
        } else {
            $pagesetting = new Pagesetting;
        }

        if ($request->hasFile('pdf')) {
            // Get the original file name
            $originalFileName = $request->file('pdf')->getClientOriginalName();
            // Extract the file extension
            $extension = $request->file('pdf')->getClientOriginalExtension(); 
            // Get the current timestamp
            $timestamp = time();
            // Create a new file name combining pdf_type, original file name, and timestamp
            $newFileName = "{$request->pdf_type}_" . pathinfo($originalFileName, PATHINFO_FILENAME) . "_{$timestamp}.{$extension}";
            // Move the file to the desired directory with the new name
            $pdfPath = $request->file('pdf')->move(public_path('pagesettings'), $newFileName);  
            // Update the pdf path in the database
            $pagesetting->pdf = $newFileName;
        }
        

        $pagesetting->pdf_type = $request->pdf_type;
        $pagesetting->save();

        return redirect()->back()->with('success', 'Page Settings updated successfully.');
    }
}
