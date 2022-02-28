<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
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

    public function addInvoice(){

        // $data= $this->getLeadgerList();
        // $json = json_encode($data);
        // $leadger_data = array_values(json_decode($json,TRUE));
        return view('backend.tally.invoice.index');
    }


    public function storeInvoice(Request $request){
        $dd= $this->importInvoice($request->all());
        // $dd=Excel::import(new UsersImport,$path);
        // $path = $request->file('group_name');
        if($dd != false){
            return redirect()->route('admin.getInvoice')->with('success', 'Invoice Created in tally.');
        }else{
            return redirect()->route('admin.getInvoice')->with('error', 'Data Not Added in tally');
        }
    }

    function importInvoice($request){
        
        $company_name=$request['company_name'];
        $bill_to=$request['bill_to'];
        $leadger=$request['ledger_name']; m
        $amount=$request['amount'];
        $total=$request['total'];
        $remote_id=rand(0, 99999999);
        $date= (int)date('Ymd');
        $voucher_number= rand(0, 9);
        $res_str =<<<XML
        <ENVELOPE>
        <HEADER>
        <TALLYREQUEST>Import Data</TALLYREQUEST>
        </HEADER>
        <BODY>
        <IMPORTDATA>
        <REQUESTDESC>
            <REPORTNAME>Vouchers</REPORTNAME>
            <STATICVARIABLES>
            <SVCURRENTCOMPANY>Aaaaa</SVCURRENTCOMPANY>
            </STATICVARIABLES>
        </REQUESTDESC>
        <REQUESTDATA>
            <TALLYMESSAGE xmlns:UDF="TallyUDF">
            <VOUCHER REMOTEID="{$remote_id}" VCHKEY="7c9224c0-13d8-4cbe-a2a9-83bc98b4ca6f-0000acfe:00000030" VCHTYPE="Payment" ACTION="Create" OBJVIEW="Accounting Voucher View">
            <OLDAUDITENTRYIDS.LIST TYPE="Number">
            <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
            </OLDAUDITENTRYIDS.LIST>
            <DATE>20210401</DATE>
            <GUID>7c9224c0-13d8-4cbe-a2a9-83bc98b4ca6f-00000006</GUID>
            <VOUCHERTYPENAME>Payment</VOUCHERTYPENAME>
            <VOUCHERNUMBER>6</VOUCHERNUMBER>
            <PARTYLEDGERNAME>{$bill_to}</PARTYLEDGERNAME>
            <CSTFORMISSUETYPE/>
            <CSTFORMRECVTYPE/>
            <FBTPAYMENTTYPE>Default</FBTPAYMENTTYPE>
            <PERSISTEDVIEW>Accounting Voucher View</PERSISTEDVIEW>
            <VCHGSTCLASS/>
            <DIFFACTUALQTY>No</DIFFACTUALQTY>
            <ISMSTFROMSYNC>No</ISMSTFROMSYNC>
            <ASORIGINAL>No</ASORIGINAL>
            <AUDITED>No</AUDITED>
            <FORJOBCOSTING>No</FORJOBCOSTING>
            <ISOPTIONAL>No</ISOPTIONAL>
            <EFFECTIVEDATE>20210401</EFFECTIVEDATE>
            <USEFOREXCISE>No</USEFOREXCISE>
            <ISFORJOBWORKIN>No</ISFORJOBWORKIN>
            <ALLOWCONSUMPTION>No</ALLOWCONSUMPTION>
            <USEFORINTEREST>No</USEFORINTEREST>
            <USEFORGAINLOSS>No</USEFORGAINLOSS>
            <USEFORGODOWNTRANSFER>No</USEFORGODOWNTRANSFER>
            <USEFORCOMPOUND>No</USEFORCOMPOUND>
            <USEFORSERVICETAX>No</USEFORSERVICETAX>
            <ISEXCISEVOUCHER>No</ISEXCISEVOUCHER>
            <EXCISETAXOVERRIDE>No</EXCISETAXOVERRIDE>
            <EXCISEOPENING>No</EXCISEOPENING>
            <USEFORFINALPRODUCTION>No</USEFORFINALPRODUCTION>
            <ISTDSOVERRIDDEN>No</ISTDSOVERRIDDEN>
            <ISTCSOVERRIDDEN>No</ISTCSOVERRIDDEN>
            <ISTDSTCSCASHVCH>No</ISTDSTCSCASHVCH>
            <INCLUDEADVPYMTVCH>No</INCLUDEADVPYMTVCH>
            <ISSUBWORKSCONTRACT>No</ISSUBWORKSCONTRACT>
            <ISVATOVERRIDDEN>No</ISVATOVERRIDDEN>
            <IGNOREORIGVCHDATE>No</IGNOREORIGVCHDATE>
            <ISSERVICETAXOVERRIDDEN>No</ISSERVICETAXOVERRIDDEN>
            <ISISDVOUCHER>No</ISISDVOUCHER>
            <ISEXCISEOVERRIDDEN>No</ISEXCISEOVERRIDDEN>
            <ISEXCISESUPPLYVCH>No</ISEXCISESUPPLYVCH>
            <ISCANCELLED>No</ISCANCELLED>
            <HASCASHFLOW>Yes</HASCASHFLOW>
            <ISPOSTDATED>No</ISPOSTDATED>
            <USETRACKINGNUMBER>No</USETRACKINGNUMBER>
            <ISINVOICE>No</ISINVOICE>
            <MFGJOURNAL>No</MFGJOURNAL>
            <HASDISCOUNTS>No</HASDISCOUNTS>
            <ASPAYSLIP>No</ASPAYSLIP>
            <ISCOSTCENTRE>No</ISCOSTCENTRE>
            <ISSTXNONREALIZEDVCH>No</ISSTXNONREALIZEDVCH>
            <ISEXCISEMANUFACTURERON>No</ISEXCISEMANUFACTURERON>
            <ISBLANKCHEQUE>No</ISBLANKCHEQUE>
            <ISVOID>No</ISVOID>
            <ISONHOLD>No</ISONHOLD>
            <ORDERLINESTATUS>No</ORDERLINESTATUS>
            <ISDELETED>No</ISDELETED>
            <CHANGEVCHMODE>No</CHANGEVCHMODE>
            <ALTERID> 19</ALTERID>
            <MASTERID> 6</MASTERID>
            <VOUCHERKEY>{$voucher_number}</VOUCHERKEY>
            <EXCLUDEDTAXATIONS.LIST>      </EXCLUDEDTAXATIONS.LIST>
            <OLDAUDITENTRIES.LIST>      </OLDAUDITENTRIES.LIST>
            <ACCOUNTAUDITENTRIES.LIST>      </ACCOUNTAUDITENTRIES.LIST>
            <AUDITENTRIES.LIST>      </AUDITENTRIES.LIST>
            <DUTYHEADDETAILS.LIST>      </DUTYHEADDETAILS.LIST>
            <SUPPLEMENTARYDUTYHEADDETAILS.LIST>      </SUPPLEMENTARYDUTYHEADDETAILS.LIST>
            <INVOICEDELNOTES.LIST>      </INVOICEDELNOTES.LIST>
            <INVOICEORDERLIST.LIST>      </INVOICEORDERLIST.LIST>
            <INVOICEINDENTLIST.LIST>      </INVOICEINDENTLIST.LIST>
            <ATTENDANCEENTRIES.LIST>      </ATTENDANCEENTRIES.LIST>
            <ORIGINVOICEDETAILS.LIST>      </ORIGINVOICEDETAILS.LIST>
            <INVOICEEXPORTLIST.LIST>      </INVOICEEXPORTLIST.LIST>
            <ALLLEDGERENTRIES.LIST>
            <OLDAUDITENTRYIDS.LIST TYPE="Number">
                <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
            </OLDAUDITENTRYIDS.LIST>
            <LEDGERNAME>{$leadger}</LEDGERNAME>
            <GSTCLASS/>
            <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
            <LEDGERFROMITEM>No</LEDGERFROMITEM>
            <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
            <ISPARTYLEDGER>No</ISPARTYLEDGER>
            <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
            <AMOUNT>-{$amount}</AMOUNT>
            <SERVICETAXDETAILS.LIST>       </SERVICETAXDETAILS.LIST>
            <BANKALLOCATIONS.LIST>       </BANKALLOCATIONS.LIST>
            <BILLALLOCATIONS.LIST>       </BILLALLOCATIONS.LIST>
            <INTERESTCOLLECTION.LIST>       </INTERESTCOLLECTION.LIST>
            <OLDAUDITENTRIES.LIST>       </OLDAUDITENTRIES.LIST>
            <ACCOUNTAUDITENTRIES.LIST>       </ACCOUNTAUDITENTRIES.LIST>
            <AUDITENTRIES.LIST>       </AUDITENTRIES.LIST>
            <INPUTCRALLOCS.LIST>       </INPUTCRALLOCS.LIST>
            <DUTYHEADDETAILS.LIST>       </DUTYHEADDETAILS.LIST>
            <EXCISEDUTYHEADDETAILS.LIST>       </EXCISEDUTYHEADDETAILS.LIST>
            <SUMMARYALLOCS.LIST>       </SUMMARYALLOCS.LIST>
            <STPYMTDETAILS.LIST>       </STPYMTDETAILS.LIST>
            <EXCISEPAYMENTALLOCATIONS.LIST>       </EXCISEPAYMENTALLOCATIONS.LIST>
            <TAXBILLALLOCATIONS.LIST>       </TAXBILLALLOCATIONS.LIST>
            <TAXOBJECTALLOCATIONS.LIST>       </TAXOBJECTALLOCATIONS.LIST>
            <TDSEXPENSEALLOCATIONS.LIST>       </TDSEXPENSEALLOCATIONS.LIST>
            <VATSTATUTORYDETAILS.LIST>       </VATSTATUTORYDETAILS.LIST>
            <COSTTRACKALLOCATIONS.LIST>       </COSTTRACKALLOCATIONS.LIST>
            <REFVOUCHERDETAILS.LIST>       </REFVOUCHERDETAILS.LIST>
            <INVOICEWISEDETAILS.LIST>       </INVOICEWISEDETAILS.LIST>
            </ALLLEDGERENTRIES.LIST>
            <ALLLEDGERENTRIES.LIST>
            <OLDAUDITENTRYIDS.LIST TYPE="Number">
                <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
            </OLDAUDITENTRYIDS.LIST>
            <LEDGERNAME>Cash</LEDGERNAME>
            <GSTCLASS/>
            <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
            <LEDGERFROMITEM>No</LEDGERFROMITEM>
            <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
            <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
            <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
            <AMOUNT>{$total}</AMOUNT>
            <SERVICETAXDETAILS.LIST>       </SERVICETAXDETAILS.LIST>
            <BANKALLOCATIONS.LIST>       </BANKALLOCATIONS.LIST>
            <BILLALLOCATIONS.LIST>       </BILLALLOCATIONS.LIST>
            <INTERESTCOLLECTION.LIST>       </INTERESTCOLLECTION.LIST>
            <OLDAUDITENTRIES.LIST>       </OLDAUDITENTRIES.LIST>
            <ACCOUNTAUDITENTRIES.LIST>       </ACCOUNTAUDITENTRIES.LIST>
            <AUDITENTRIES.LIST>       </AUDITENTRIES.LIST>
            <INPUTCRALLOCS.LIST>       </INPUTCRALLOCS.LIST>
            <DUTYHEADDETAILS.LIST>       </DUTYHEADDETAILS.LIST>
            <EXCISEDUTYHEADDETAILS.LIST>       </EXCISEDUTYHEADDETAILS.LIST>
            <SUMMARYALLOCS.LIST>       </SUMMARYALLOCS.LIST>
            <STPYMTDETAILS.LIST>       </STPYMTDETAILS.LIST>
            <EXCISEPAYMENTALLOCATIONS.LIST>       </EXCISEPAYMENTALLOCATIONS.LIST>
            <TAXBILLALLOCATIONS.LIST>       </TAXBILLALLOCATIONS.LIST>
            <TAXOBJECTALLOCATIONS.LIST>       </TAXOBJECTALLOCATIONS.LIST>
            <TDSEXPENSEALLOCATIONS.LIST>       </TDSEXPENSEALLOCATIONS.LIST>
            <VATSTATUTORYDETAILS.LIST>       </VATSTATUTORYDETAILS.LIST>
            <COSTTRACKALLOCATIONS.LIST>       </COSTTRACKALLOCATIONS.LIST>
            <REFVOUCHERDETAILS.LIST>       </REFVOUCHERDETAILS.LIST>
            <INVOICEWISEDETAILS.LIST>       </INVOICEWISEDETAILS.LIST>
            </ALLLEDGERENTRIES.LIST>
            <PAYROLLMODEOFPAYMENT.LIST>      </PAYROLLMODEOFPAYMENT.LIST>
            <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
            </VOUCHER>
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
        // get the xml object
        $object = simplexml_load_string( $data );

        return $msg;
    }
}
