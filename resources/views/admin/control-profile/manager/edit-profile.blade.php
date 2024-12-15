{{-- @extends('customer.layouts.blank-vanilla') --}}
@extends('admin.layouts.blank')
@section('title')
Dashboard
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Edit Basic Profile</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Edit Basic Profile Of Associate</div>
        <div class="card-body">

            {{-- errors or success display  --}}
            {{-- <div class="container">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                       {{session('success')}}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    @endif
            </div> --}}

            @if($manager)
            <div class="container">
                <form action="" method="post" id="form">
                    @csrf

                    {{-- basic info --}}
                    <div class="col-md-10 ml-auto mr-auto mt-3 border p-4">
                        <h1 class="mb-4">BASIC DETAILS</h1>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">First Name</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Last Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="fname" id="fname" value="{{$manager->first_name}}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lname" id="lname" value="{{$manager->last_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="father_name">Father's name</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="mother_name">Mother's name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="father_name" id="father_name" value="{{$manager->father_name}}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="mother_name" id="mother_name" value="{{$manager->mother_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email">Email ID</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{$manager->email}}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Phone Number</label>
                                    <input type="phone" name="phone" id="phone" class="form-control" value="{{$manager->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male" @if($manager->gender == 'male') selected @endif>Male</option>
                                        <option value="female" @if($manager->gender == 'female') selected @endif>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="blood_group">Blood Group</label>
                                    <select name="blood_group" id="blood_group" class="form-control">
                                        <option value="" @if($manager->blood_group == null) selected @endif>Select</option>
                                        <option value="A+" @if($manager->blood_group == 'A+') selected @endif>A+</option>
                                        <option value="A-" @if($manager->blood_group == 'A-') selected @endif>A-</option>
                                        <option value="B+" @if($manager->blood_group == 'B+') selected @endif>B+</option>
                                        <option value="B-" @if($manager->blood_group == 'B-') selected @endif>B-</option>
                                        <option value="AB+" @if($manager->blood_group == 'AB+') selected @endif>AB+</option>
                                        <option value="AB-" @if($manager->blood_group == 'AB-') selected @endif>AB-</option>
                                        <option value="O+" @if($manager->blood_group == 'O+') selected @endif>O+</option>
                                        <option value="O-" @if($manager->blood_group == 'O-') selected @endif>O-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="dob">Date Of Birth</label>
                                    <input type="date" name="dob" id="dob" class="form-control"
                                    @if ($manager->dob != null) value="{{$manager->dob}} @endif">
                                </div>
                                <div class="col-md-6">
                                    <label for="physically_challenged">Physically Challenged</label>
                                    <select name="physically_challenged" id="physically_challenged" class="form-control">
                                        <option value="true" @if($manager->physically_challenged == true) selected @endif>True</option>
                                        <option value="false" @if($manager->physically_challenged != true) selected @endif>False</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="religion">Religion</label>
                                    <input type="text" name="religion" id="religion" class="form-control"
                                    @if ($manager->religion != null) value="{{$manager->religion}} @endif">
                                </div>
                                <div class="col-md-6">
                                    <label for="caste">Caste</label>
                                    <select name="caste" id="caste" class="form-control">
                                        <option value="" @if($manager->caste == null) selected @endif>Selcet</option>
                                        <option value="General" @if($manager->caste == 'General') selected @endif>General</option>
                                        <option value="SC" @if($manager->caste != 'SC') selected @endif>SC</option>
                                        <option value="ST" @if($manager->caste != 'ST') selected @endif>ST</option>
                                        <option value="OBC - A" @if($manager->caste != 'OBC - A') selected @endif>OBC - A</option>
                                        <option value="OBC - B" @if($manager->caste != 'OBC - B') selected @endif>OBC - B</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="permanent_address">Permanent Address</label>
                                    <textarea type="text" name="permanent_address" id="permanent_address" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="present_address">Present Address</label>
                                    <textarea type="text" name="present_address" id="present_address" class="form-control" rows="3"></textarea>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="residential_status">Residential Status</label>
                                    <select name="residential_status" id="residential_status" class="form-control">
                                        <option value="" @if($manager->residential_status == null) selected @endif>Selcet</option>
                                        <option value="Govt. House" @if($manager->residential_status == 'Govt. House') selected @endif>Govt. House</option>
                                        <option value="Private Rental" @if($manager->residential_status != 'Private Rental') selected @endif>Private Rental</option>
                                        <option value="Own House" @if($manager->residential_status != 'Own House') selected @endif>Own House</option>
                                        <option value="Spouse House" @if($manager->residential_status != 'Spouse House') selected @endif>Spouse House</option>
                                        <option value="Relative House" @if($manager->residential_status != 'Relative House') selected @endif>Relative House</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="state">State</label>
                                    <input type="text" name="state" id="state" class="form-control"
                                    @if ($manager->state != null) value="{{$manager->state}} @endif">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="mother_tongue">Mother Tongue</label>
                                    <select name="mother_tongue" id="mother_tongue" class="form-control">
                                        @php
                                          $lang = [
                                            'Bengali', 'Assamese', 'Hindi', 'English', 'Gujarati',
                                            'Malayalam', 'Manipuri', 'Marathi', 'Nepali', 'Bhoti',
                                            'Oriya', 'Punjabi', 'Sanskrit', 'Sindhi', 'Tamil', 'Other languages'

                                            ];
                                        @endphp
                                        <option value="" @if($manager->mother_tongue == null) selected @endif>Select</option>
                                        @foreach ($lang as $language)
                                            <option value="{{$language}}" @if($manager->mother_tongue == $language) selected @endif>{{$language}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="marital_status">Marital Status</label>
                                    <select name="marital_status" id="marital_status" class="form-control">
                                        <option value="True" @if($manager->marital_status == true) selected @endif>Married</option>
                                        <option value="False" @if($manager->marital_status != true) selected @endif>Not Marraied</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="spouse_name">Spouse Name
                                        <small class="small">(Leave Blank If Not Marraied)</small>
                                    </label>
                                    <input type="text" name="spouse_name" id="spouse_name" class="form-control" value="{{$manager->spouse_name}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="spouse_is_employed">Spouse Is Employed</label>
                                    <select name="spouse_is_employed" id="spouse_is_employed" class="form-control">
                                        <option value="" @if ($manager->spouse_is_employed == null) selected @endif>Not Married</option>
                                        <option value="true" @if ($manager->spouse_is_employed == true) selected @endif>Yes, Employed</option>
                                        <option value="false"@if ($manager->spouse_is_employed == false) selected @endif>Not Employed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="court_case">Whether Any Court Case</label>
                                    <select name="court_case" id="court_case" class="form-control">
                                        <option value="true" @if ($manager->court_case == true) selected @endif>Yes</option>
                                        <option value="false"@if ($manager->court_case != true) selected @endif>No</option>
                                    </select>
                                    </div>
                                <div class="col-md-6">
                                    <label for="case_no">Case No.</label>
                                    <input type="text" name="court_case" id="court_case" class="form-control" value="{{$manager->court_case}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="case_year">Case Year</label>
                                    <input type="number" name="case_year" id="court_case" class="form-control" value="{{$manager->case_year}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="case_related_with">Case Related With</label>
                                    <input type="text" name="case_related_with" id="case_related_with" class="form-control" value="{{$manager->case_related_with}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="aadhar_no">Aadhar Number</label>
                                    <input type="number" name="aadhar_no" id="aadhar_no" class="form-control" value="{{$manager->aadhar_no}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="epic">EPIC</label>
                                    <input type="text" name="epic" id="epic" class="form-control" value="{{$manager->epic}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="height">Height</label>
                                    <input type="number" name="height" id="height" class="form-control" value="{{$manager->height}}">
                                </div>
                                {{-- <div class="col-md-6">
                                    <label for="epic">EPIC</label>
                                    <input type="text" name="epic" id="epic" class="form-control" required>
                                </div> --}}
                            </div>
                        </div>

                    </div>

                    {{-- educational details --}}
                    <div class="col-md-10 ml-auto mr-auto mt-3 border p-4">
                        <h1 class="mb-4">Educational Details</h1>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="qualification">Qualification</label>
                                    <input type="text" name="qualification" id="qualification" class="form-control" value="{{$manager->qualification}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="qualification_type">Qualification Type</label>
                                    <select name="qualification_type" id="qualification_type" class="form-control">
                                        <option value="" @if ($manager->qualification_type==null) selected @endif>Select</option>
                                        @php
                                            $q_type = ['PH.D.', 'M.PHIL',  'POST GRADUATE', 'HONS GRADUATE',
                                            'GRADUATE', 'HIGHER SECONDARY', 'SECONDARY', 'BELOW SECONDARY',
                                            'OTHERS'];
                                        @endphp
                                        @foreach ($q_type as $q)
                                            <option value="{{$q}}" @if ($q == $manager->qualification_type) selected @endif>{{$q}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="professional_qualiffication">Professional Qualification</label>
                                    <select name="professional_qualiffication" id="professional_qualiffication" class="form-control">
                                        <option value="" @if ($manager->professional_qualiffication==null) selected @endif>Select</option>
                                        @php
                                            $pro_q = ['BT', 'B.Ed', 'PGBT','BPEd',
                                            'MPEd','Special B.Ed','Others'];
                                        @endphp
                                        @foreach ($pro_q as $q)
                                            <option value="{{$q}}" @if ($q == $manager->professional_qualiffication) selected @endif>{{$q}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="year_of_passing">Year Of Passing</label>
                                    <input type="number" name="year_of_passing" id="year_of_passing" class="form-control" value="{{$manager->year_of_passing}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- work details --}}
                    <div class="col-md-10 ml-auto mr-auto mt-3 border p-4">
                        <h1 class="mb-4">Work Details</h1>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date_of_joining">Date Of Joinning</label>
                                    <input type="date" name="date_of_joining" id="date_of_joining" class="form-control"
                                    @if($manager->date_of_joining != null) value="{{$manager->date_of_joining}}" @endif>
                                </div>
                                <div class="col-md-6">
                                    <label for="date_of_retirement">Date Of Retirement</label>
                                    <input type="date" name="date_of_retirement" id="date_of_retirement" class="form-control"
                                    @if($manager->date_of_retirement != null) value="{{$manager->date_of_retirement}}" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="appointment_date_and_no">Approval of Appointment Number & Date</label>
                                    <input type="text" name="appointment_date_and_no" id="appointment_date_and_no" class="form-control"
                                    @if($manager->appointment_date_and_no != null) value="{{$manager->appointment_date_and_no}}" @endif>
                                </div>
                                <div class="col-md-6">
                                    <label for="pan">PAN</label>
                                    <input type="text" name="pan" id="pan" class="form-control"
                                    @if($manager->pan != null) value="{{$manager->pan}}" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pay_band">Name of Pay Band</label>
                                    <select name="pay_band" id="pay_band" class="form-control">
                                        <option value="" @if ($manager->pay_band==null) selected @endif>Select</option>
                                        @php
                                            $pay_band = ['abcd', 'kds'];
                                        @endphp
                                        @foreach ($pay_band as $q)
                                            <option value="{{$q}}" @if ($q == $manager->pay_band) selected @endif>{{$q}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="grade_pay">Grade Pay</label>
                                    <select name="grade_pay" id="grade_pay" class="form-control">
                                        <option value="" @if ($manager->grade_pay==null) selected @endif>Select</option>
                                        {{-- @php
                                            $grade_pay = ['sjnsd','sn'];
                                        @endphp
                                        @foreach ($grade_pay as $q)
                                            <option value="{{$q}}" @if ($q == $manager->grade_pay) selected @endif>{{$q}}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pay_band_scale">Pay Band Scale</label>
                                    <input type="text" name="pay_band_scale" id="pay_band_scale" class="form-control"
                                    @if($manager->pay_band_scale != null) value="{{$manager->pay_band_scale}}" @endif>
                                </div>
                                {{-- <div class="col-md-6">
                                    <label for="pan">PAN</label>
                                    <input type="date" name="pan" id="pan" class="form-control" required
                                    @if($manager->pan != null) value="{{$manager->pan}}" @endif>
                                </div> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="salary_ac_no">Salary A/c No</label>
                                    <input type="number" name="salary_ac_no" id="salary_ac_no" class="form-control"
                                        @if($manager->salary_ac_no != null) value="{{$manager->salary_ac_no}}" @endif>
                                </div>
                                <div class="col-md-6">
                                    <label for="salary_payee_bank">Salary Payee Bank</label>
                                    <input type="text" name="salary_payee_bank" id="salary_payee_bank" class="form-control"
                                        @if($manager->salary_payee_bank != null) value="{{$manager->salary_payee_bank}}" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="bank_branch_name">Bank Branch Name (With Code)</label>
                                    <input type="text" name="bank_branch_name" id="bank_branch_name" class="form-control"
                                        @if($manager->bank_branch_name != null) value="{{$manager->bank_branch_name}}" @endif>
                                </div>
                                <div class="col-md-6">
                                    <label for="ifsc_code">IFSC Code</label>
                                    <input type="text" name="ifsc_code" id="ifsc_code" class="form-control"
                                        @if($manager->ifsc_code != null) value="{{$manager->ifsc_code}}" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="micr_code">MICR Code</label>
                                    <input type="text" name="micr_code" id="micr_code" class="form-control"
                                        @if($manager->micr_code != null) value="{{$manager->micr_code}}" @endif>
                                </div>
                                <div class="col-md-6">
                                    <label for="medical_leave">Medical Leave On Current Date</label>
                                    <input type="date" name="medical_leave" id="medical_leave" class="form-control"
                                        @if($manager->medical_leave != null) value="{{$manager->medical_leave}}" @endif>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- utility buttons --}}
                    <div class="col-md-10 ml-auto mr-auto mt-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger">Go Back</a>
                        </div>
                        <div class="form-group">
                                <a href="{{route('admin.manager.edit.password',['id'=>$manager->id])}}">Change Password</a>
                        </div>

                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    $('#permanent_address').attr('value', $manager->parmanent_address);
    $('#present_address').attr('value', $manager->current_address);
</script>
@endpush
@endsection
