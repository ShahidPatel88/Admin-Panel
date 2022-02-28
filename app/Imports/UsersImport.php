<?php



namespace App\Imports;



use App\User;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class UsersImport implements ToModel,  WithHeadingRow

{

    /**

    * @param array $row

    *

    * @return \Illuminate\Database\Eloquent\Model|null

    */
    private $data;

    public function __construct(){
        $this->data = [];
    }
    public function model(array $rows)
    {
        // dd($rows);
        //     $data=[];
        //     foreach($rows as $key=> $row){
        //         dd($key);

        //     }
        //     dd($data);

            return [
                'companyname'=>$rows['companyname'] ?? '',
                'bill_to'=>$rows['bill_to'] ?? '',
                'leadger'=>$rows['ledger'],
                'amount'=>$rows['amount'] ?? '',
                'total'=>$rows['total']
            ];
            // $company_name='aaa';
            // $bill_to=$rows['bill_to'];
            // $leadger=$rows['ledger'];
            // $amount=$rows['amount'];
            // $total=$rows['total'];
            $remote_id=rand(0, 99999999);
            $date= date('Ymd');
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
                        <VOUCHER REMOTEID="7c9224c0-13d8-4cbe-a2a9-83bc98b4ca6f-00000006" VCHKEY="7c9224c0-13d8-4cbe-a2a9-83bc98b4ca6f-0000acfe:00000030" VCHTYPE="Payment" ACTION="Create" OBJVIEW="Accounting Voucher View">
                        <OLDAUDITENTRYIDS.LIST TYPE="Number">
                        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
                        </OLDAUDITENTRYIDS.LIST>
                        <DATE>20210401</DATE>
                        20220228
                        <GUID>7c9224c0-13d8-4cbe-a2a9-83bc98b4ca6f-00000006</GUID>
                        <VOUCHERTYPENAME>Payment</VOUCHERTYPENAME>
                        <VOUCHERNUMBER>6</VOUCHERNUMBER>
                        <PARTYLEDGERNAME>Cash</PARTYLEDGERNAME>
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
                        <VOUCHERKEY>190206921670704</VOUCHERKEY>
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
                        <LEDGERNAME>INNOVIUS</LEDGERNAME>
                        <GSTCLASS/>
                        <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
                        <LEDGERFROMITEM>No</LEDGERFROMITEM>
                        <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
                        <ISPARTYLEDGER>No</ISPARTYLEDGER>
                        <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
                        <AMOUNT>-25000.00</AMOUNT>
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
                        <AMOUNT>25000.00</AMOUNT>
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

            //         return $res_str;
    }

}
