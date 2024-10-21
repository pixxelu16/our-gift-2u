<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GiftCard;

class GiftCardsController extends Controller
{
    //Function For all gift cards
    public function all_gift_cards(){
        $all_gift_cards = GiftCard::get();
        return view('admin.gift-cards.all-gift-cards', compact('all_gift_cards'));
    }

    //Function For add gift_cards
    public function add_gift_cards(){
        return view('admin.gift-cards.add-gift-cards');
    }

    //function for sumit gift_cards
    public function submit_gift_cards(Request $request){ 
        //If image is exit or not
        $image  = "default.jpeg";
        if($request->hasFile('image')){ 
            $image = 'image_'.time().rand(1,50).'.'.$request->file('image')->extension();
            $request->file('image')->move('public/uploads/gift-cards/', $image) ;  
        }

        //insert Query
        $gift_cards_insert = GiftCard::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'image' => $image,
            'card_amount' => $request->card_amount,
            'valid_date' => $request->valid_date,
            'claim_code' => $request->claim_code,
            'quintity' => $request->quintity,
            'status' => $request->status
        ]);

        //Check if data is insert or not
        if($gift_cards_insert){  
            return back()->with('success','Gift Cards has been created successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

    //Function For add gift_cards
    public function edit_gift_cards($id){
        $gift_cards_detail = GiftCard::Where('id',$id)->first();

        return view('admin.gift-cards.edit-gift-cards', compact('gift_cards_detail'));
    }

    //function for update gift_cards
    public function update_gift_cards(Request $request, $id){ 
        //If image is exit or not
        if($request->hasFile('image')){ 
            $image = 'image_'.time().rand(1,50).'.'.$request->file('image')->extension();
            $request->file('image')->move('public/uploads/gift-cards/', $image) ; 
            
            //Update Image
            GiftCard::Where('id', $id)->update(['image' => $image]);
        }

        //insert Query
        $gift_cards_update = GiftCard::Where('id', $id)->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'card_amount' => $request->card_amount,
            'valid_date' => $request->valid_date,
            'claim_code' => $request->claim_code,
            'quintity' => $request->quintity,
            'status' => $request->status
        ]);

        //Check if data is updated  or not
        if($gift_cards_update){  
            return back()->with('success','Gift Card has been updated successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

    //function for delete gift_cards
    public function delete_gift_cards($id){
        $is_gift_cards_delete = GiftCard::Where('id', $id)->delete();

        //Check if Gift Cards is deleted or not
        if($is_gift_cards_delete){
            return back()->with('success','Gift Cards has been deleted successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }
}
