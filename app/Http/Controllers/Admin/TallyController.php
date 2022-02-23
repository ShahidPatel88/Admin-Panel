<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TallyController extends Controller
{
    public function getGroupItems(){
        return view('backend.tally.group_items.index');
    }
    public function addGroupItems(Request $request){

        $group_name = strtoupper($request->group_name);

        $item_name = $request->item_name;

        $dd= $this->groupItems($group_name,$item_name);
        if($dd != false){
            return redirect()->route('admin.getGroupItems')->with('success', 'Data Created in tally.');
        }else{
            return redirect()->route('admin.getGroupItems')->with('error', 'Data Not Added in tally');
        }


    }

    public function getLedgerAccount(){
        return view('backend.tally.leadger_account.store');
    }

    public function getLedgerAccountList(){
        $data= $this->getLeadgerList();
        $json = json_encode($data);
        $leadger_data = array_values(json_decode($json,TRUE));

        return view('backend.tally.leadger_account.index',compact('leadger_data'));


    }

    public function addLedgerAccount(Request $request){

        $dd= $this->createLedgerAccount($request->all());
        if($dd != false){
            return redirect()->route('admin.getLedgerAccount')->with('success', 'Data Created in tally.');
        }else{
            return redirect()->route('admin.getLedgerAccount')->with('error', 'Data Not Added in tally');
        }
    }

    function createLedgerAccount($request){

        $name=strtoupper($request['name']);
        $res_str =       <<<XML
                            <ENVELOPE>
                            <HEADER>
                            <TALLYREQUEST>Import Data</TALLYREQUEST>
                            </HEADER>
                            <BODY>
                            <IMPORTDATA>
                            <REQUESTDESC>
                            <REPORTNAME>All Masters</REPORTNAME>
                            </REQUESTDESC>
                            <REQUESTDATA>

                            <TALLYMESSAGE>
                            <LEDGER NAME="{$name}">

                            <ADDRESS.LIST TYPE="String">
                            <ADDRESS>{$request['address']}</ADDRESS>
                            </ADDRESS.LIST>

                            <NAME.LIST>
                            <NAME>{$name}</NAME>
                            </NAME.LIST>

                            <COUNTRYNAME>{$request['country']}</COUNTRYNAME>
                            <LEDSTATENAME>{$request['state']}</LEDSTATENAME>
                            <PARENT>Capital Account</PARENT>

                            </LEDGER>
                            </TALLYMESSAGE>
                            </REQUESTDATA>
                            </IMPORTDATA>
                            </BODY>
                            </ENVELOPE>
                            XML;

                    $url = "http://localhost:9000/";

                    //setting the curl parameters.
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    // Following line is compulsary to add as it is:
                    curl_setopt($ch, CURLOPT_POSTFIELDS,
                                "xmlRequest=" . $res_str);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
                    $data = curl_exec($ch);

                    if(curl_errno($ch)){
                        var_dump($data);
                        $msg=false;
                    } else {
                        $msg = $data;
                    }

                    curl_close($ch);
                    return $msg;
    }



    function groupItems($group,$item){

        $res_str =<<<XML
                    <ENVELOPE>
                <HEADER>
                <TALLYREQUEST>Import Data</TALLYREQUEST>
                </HEADER>
                <BODY>
                <IMPORTDATA>
                <REQUESTDESC>
                <REPORTNAME>All Masters</REPORTNAME>
                </REQUESTDESC>
                <REQUESTDATA>


                <TALLYMESSAGE xmlns:UDF="TallyUDF">
                    <STOCKGROUP NAME="{$group}" ACTION="Create">
                    <NAME.LIST>
                    <NAME>{$group}</NAME>
                    </NAME.LIST>
                    <PARENT/>
                    <ISADDABLE>Yes</ISADDABLE>
                    </STOCKGROUP>
                    </TALLYMESSAGE>


                    <TALLYMESSAGE xmlns:UDF="TallyUDF">
                    <STOCKITEM NAME="{$item}" ACTION="Create">
                    <NAME.LIST>
                    <NAME>{$item}</NAME>
                    </NAME.LIST>
                    <PARENT>{$item}</PARENT>


                <BATCHALLOCATIONS.LIST>
                <NAME>Primary Batch</NAME>
                <BATCHNAME>Primary Batch</BATCHNAME>
                <GODOWNNAME>Main Location</GODOWNNAME>
                <MFDON>20190120</MFDON>
                <OPENINGBALANCE>0.000 NOS</OPENINGBALANCE>
                <OPENINGVALUE>0.000</OPENINGVALUE>
                <OPENINGRATE>0.000/NOS</OPENINGRATE>
                </BATCHALLOCATIONS.LIST>
                </STOCKITEM>
                </TALLYMESSAGE>
                </REQUESTDATA>
                </IMPORTDATA>
                </BODY>
                </ENVELOPE>
                XML;

                $url = "http://localhost:9000/";

                //setting the curl parameters.
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                // Following line is compulsary to add as it is:
                curl_setopt($ch, CURLOPT_POSTFIELDS,
                            "xmlRequest=" . $res_str);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
                $data = curl_exec($ch);

                if(curl_errno($ch)){
                    var_dump($data);
                    $msg=false;
                } else {
                    $msg = $data;
                }

                curl_close($ch);
                return $msg;
    }

    function getLeadgerList(){

        $res_str =<<<XML
        <ENVELOPE>
            <HEADER>
                <VERSION>1</VERSION>
                <TALLYREQUEST>Export</TALLYREQUEST>
                <TYPE>Data</TYPE>
                <ID>List of Ledgers</ID>
            </HEADER>
            <BODY>
                <DESC>
                <TDL>
                    <TDLMESSAGE>
                    <REPORT NAME="List of Ledgers" ISMODIFY="No" ISFIXED="No" ISINITIALIZE="No" ISOPTION="No" ISINTERNAL="No">
                        <FORMS>List of Ledgers</FORMS>
                    </REPORT>
                    <FORM NAME="List of Ledgers" ISMODIFY="No" ISFIXED="No" ISINITIALIZE="No" ISOPTION="No" ISINTERNAL="No">
                        <TOPPARTS>List of Ledgers</TOPPARTS>
                        <XMLTAG>"List of Ledgers"</XMLTAG>
                    </FORM>
                    <PART NAME="List of Ledgers" ISMODIFY="No" ISFIXED="No" ISINITIALIZE="No" ISOPTION="No" ISINTERNAL="No">
                        <TOPLINES>List of Ledgers</TOPLINES>
                        <REPEAT>List of Ledgers : Collection of Ledgers</REPEAT>
                        <SCROLLED>Vertical</SCROLLED>
                    </PART>
                    <LINE NAME="List of Ledgers" ISMODIFY="No" ISFIXED="No" ISINITIALIZE="No" ISOPTION="No" ISINTERNAL="No">
                        <LEFTFIELDS>List of Ledgers</LEFTFIELDS>
                    </LINE>
                    <FIELD NAME="List of Ledgers" ISMODIFY="No" ISFIXED="No" ISINITIALIZE="No" ISOPTION="No" ISINTERNAL="No">
                        <SET>\$Name</SET>
                        <XMLTAG>"LEDGERNAME"</XMLTAG>
                    </FIELD>

                    <COLLECTION NAME="Collection of Ledgers" ISMODIFY="No" ISFIXED="No" ISINITIALIZE="No" ISOPTION="No" ISINTERNAL="No">
                        <TYPE>Ledger</TYPE>
                    </COLLECTION>
                    </TDLMESSAGE>
                </TDL>
                </DESC>
            </BODY>
        </ENVELOPE>
XML;

$url = "http://localhost:9000/";

        //setting the curl parameters.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
// Following line is compulsary to add as it is:
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                    "xmlRequest=" . $res_str);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        $data = curl_exec($ch);
		//echo '<pre>';
		//var_dump($data);die;

        curl_close($ch);
		// get the xml object
        $object = simplexml_load_string( $data );
        return $object;
    }
}
