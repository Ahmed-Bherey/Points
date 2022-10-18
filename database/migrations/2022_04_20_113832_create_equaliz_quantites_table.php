<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEqualizQuantitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equaliz_quantites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('total_id')->nullable();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('items_id');
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->longText('note')->nullable();
            $table->timestamps();
            // $table->foreign('store_id')->references('id')->on('st_stores')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('items_id')->references('id')->on('ite_items')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equaliz_quantites');
    }
}


// $value=  $treasuriesTransfer = TreasuryTransfer::where('id',$id)->value('value');
//                /** add the value */
//              $from = Treasury::where('id', $request->treasuryFrom_id)
//                 ->value('treasury_value');
//                 Treasury::where('id', $request->treasuryFrom_id)->update([
//                     'treasury_value' => $from +$value,
//                 ]);

//                 $to = Treasury::where('id', $request->treasuryTo_id)
//                 ->value('treasury_value');
//                 Treasury::where('id', $request->treasuryTo_id)->update([
//                     'treasury_value' => $to - $value,
//                 ]);

//                 /**end add value  */
//             if ($request->value  <= $from) {
//                 Treasury::where('id', $request->treasuryFrom_id)->update([
//                     'treasury_value' => $from - $request->value,
//                 ]);
//                 // exit();
//                 $to = Treasury::where('id', $request->treasuryTo_id)
//                     ->value('treasury_value');
//                 Treasury::where('id', $request->treasuryTo_id)->update([
//                     'treasury_value' => $to + $request->value,
//                 ]);

//                 $treasuriesTransfer = TreasuryTransfer::findOrFail($id);
//                 $treasuriesTransfer->update([
//                     'date' => $request->date,
//                     'treasuryFrom_id' => $request->treasuryFrom_id,
//                     'treasuryTo_id' => $request->treasuryTo_id,
//                     'value' => $request->value,
//                     'notes' => $request->notes,
//                 ]);
//                 return redirect()->route('treasuryTransfer.create')->with(['success' => " تم  بنجاح"]);
//             }
//         }
//     }
