@extends('layouts.app')

@section('content')
<form role="form" action="{{ route('store.tickets') }}" method="POST">
{{ csrf_field() }}
<div class="invoice-00001 m-4">
    <div class="content-section  animated animatedFadeInUp fadeInUp">

        <div class="row inv--head-section">

            <div class="col-sm-6 col-12">
                <h3 class="in-heading">CREATE IT WORK ORDER</h3>
            </div>
            <div class="col-sm-6 col-12 align-self-center text-sm-right">
                <div class="company-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                    <h5 class="inv-brand-name">CORK</h5>
                </div>
            </div>
            
        </div>

        <div class="row inv--detail-section">

            <div class="col-sm-6 align-self-center">
                <p class="inv-to form-label">NAME<input type="text" name="requestor" value="{{ Auth::user()->name }}" class="text-primary form-control" readonly></p>
            </div>
            <div class="col-sm-6 align-self-center  text-sm-right order-sm-0 order-1">
                <p class="inv-detail-title form-label">DATE/TIME<input type="date" value="{{ date('Y-m-d') }}" class="text-primary form-control" readonly> </p>
            </div>
            
            <div class="col-sm-6 align-self-center">
                <p class="inv-customer-name form-label">DEPT<input type="text" name="requestor_dept" value="{{ Auth::user()->dept }}" class="text-primary form-control" readonly></p>
            </div>
            <div class="col-sm-6 align-self-center  text-sm-right order-2">
                <p class="inv-list-number form-label"><span class="inv-title">PHONE</span> <input type="tel" name="requestor_phone" value="" class="text-primary form-control" required></p>
                
            </div>
            <div class="col-12 order-3 align-self-center mb-5 mt-3">
                <p>CATEGORY: </p>
                <table>
                    <tr>
                        <td>
                            <input type="radio" name="category" id="InputFourZ" value="FourZ" required>
                            <label for="InputFourZ" class="text-dark">FourZ</label>
                        </td>
                        <td>
                            <input type="radio" name="category" id="InputWebsite" value="Website">
                            <label for="InputWebsite" class="text-dark">Website</label>
                        </td>
                        <td>
                            <input type="radio" name="category" id="InputHelpdesk" value="Helpdesk">
                            <label for="InputHelpdesk" class="text-dark">Helpdesk</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="category" id="InputService" value="Service">
                            <label for="InputService" class="text-dark">Service/Repair/RMA</label>
                        </td>
                        <td>    
                            <input type="radio" name="category" id="InputInternet" value="Internet">
                            <label for="InputInternet" class="text-dark">Internet Connection</label>
                        </td>
                        <td>
                            <input type="radio" name="category" id="InputOther" value="Other">
                            <label for="InputOther" class="text-dark">Other</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="category" id="InputVoucher" value="Voucher">
                            <label for="InputVoucher" class="text-dark">Ticket/Voucher</label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <p>REQUEST DETAILS: </p>
                <textarea class="request-detail" 
                          style="height: 400px; width: 100%; border: 1px solid #DADADA; padding: 10px; box-sizing: border-box; resize: none;" 
                          placeholder="Write your detailed request here..." 
                          name="request_detail"
                          required></textarea>
            </div>
        </div>
        
        <div class="row my-3">
            <div class="col-sm-6 align-self-center order-1 text-sm-right">
                <p>STATUS: </p>
            </div>
            <div class="col-sm-6 align-self-center order-2">
                <input type="text" class="status-detail" style="height: 30px; width: 100%; border: 1px solid #DADADA" placeholder="Request Draft" readonly>
                <input type="hidden" name="status" value="on_Request">
            </div>
        </div>

        <div class="row my-3">
            <div class="col-sm-6 align-self-center order-1 text-sm-right">
                <p>URGENCY: </p>
            </div>
            <div class="col-sm-6 order-2">
                <table>
                    <tr>
                        <td>
                            <input type="radio" name="urgency" value="Low" id="InputUrgencyLow" required>
                            <label for="InputUrgencyLow" class="text-dark mr-3">LOW</label>
                        </td>
                        <td>
                            <input type="radio" name="urgency" value="Medium" id="InputUrgencyMedium">
                            <label for="InputUrgencyMedium" class="text-dark mr-3">MEDIUM</label>
                        </td>
                        <td>
                            <input type="radio" name="urgency" value="High" id="InputUrgencyHigh">
                            <label for="InputUrgencyHigh" class="text-dark mr-3">HIGH</label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>


</form>
@endsection