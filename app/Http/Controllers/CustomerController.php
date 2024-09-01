<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    //
    public function index() 
    { 
        // if(NotFoundHttpException::class == 'App\\Http\\Controllers\\CustomerController')
        $customers = Customer::all(); 
        return response()->json([ 
            'status' => true, 
            'message' => 'Customers retrieved successfully', 
            'data' => $customers 
        ], 200); 
    } 
    public function testar(){
        return response()->json([
            'message' => 'Hello World!'
        ]);
    }
    public function holla(){
        return response("hello");
    }
 
    public function show($id) 
    { 
        $customer = Customer::findOrFail($id); 
        return response()->json([ 
            'status' => true, 
            'message' => 'Customer found successfully', 
            'data' => $customer 
        ], 200); 
    } 
 
    public function store(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required|string|max:255', 
            'email' => 'required|string|email|unique:customers|max:255', 
        ]); 
 
        if ($validator->fails()) { 
            return response()->json([ 
                'status' => false, 
                'message' => 'Validation error', 
                'errors' => $validator->errors() 
            ], 422); 
        } 
 
        $customer = Customer::create($request->all()); 
        return response()->json([ 
            'status' => true, 
            'message' => 'Customer created successfully', 
            'data' => $customer 
        ], 201); 
    } 
 
    public function update(Request $request, $id) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required|string|max:255', 
            'email' => 
'required|string|email|max:255|unique:customers,email,' . $id, 
        ]); 
 
        if ($validator->fails()) { 
            return response()->json([ 
                'status' => false, 
                'message' => 'Validation error', 
                'errors' => $validator->errors() 
            ], 422); 
        } 
 
        $customer = Customer::findOrFail($id); 
        $customer->update($request->all()); 
 
        return response()->json([ 
            'status' => true, 
            'message' => 'Customer updated successfully', 
            'data' => $customer 
        ], 200); 
    } 
 
    public function destroy($id) 
    { 
        $customer = Customer::findOrFail($id); 
        $customer->delete(); 
         
        return response()->json([ 
            'status' => true, 
            'message' => 'Customer deleted successfully' 
        ], 204); 
} 
}
