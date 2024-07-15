<?php
namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
 
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::with('products')->get();
        
        return view('products.index', compact('products', 'categories'));

    }
    public function Cateindex()
    {
        $categories = Category::all();
        return view('categorys.index', compact('categories'));
    }
    
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('products.create ', compact('products','categories'));
        
    }
    public function Catecreate()
    {
        $categories = Category::all();
        return view('categorys.create ', compact('categories'));
        
    }


    // Lưu sản phẩm mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'productname' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'nullable',
            'description' => 'nullable',
        ]); 
          $input = $request->all();
   
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
     
        Product::create($input);

        // Tạo mới sản phẩm


        // Chuyển hướng về trang danh sách sản phẩm sau khi đã thêm thành công
        return redirect()->route('products.index')
        ->with('success','Product updated successfully');
    }

    public function Catestore(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'catname' => 'required|string|max:255', // Validation rule for 'catname' field
    ]);

    // Create a new Casi instance
    $categories = new Category();
    $categories->catname = $validatedData['catname']; // Assign 'catname' field

    // Save the Casi to the database
    $categories->save();

    // Redirect to the index page or any other page you prefer
    return redirect()->route('categorys.index')->with('success', 'Casi created successfully!');
}

    // Hiển thị form để chỉnh sửa sản phẩm
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }
    public function Catedit($id)
    {
        $category = Category::findOrFail($id);
        return view('categorys.edit', compact('category'));
    }

    // Cập nhật sản phẩm trong cơ sở dữ liệu
    public function update(Request $request, Product $product)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'productname' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Thêm validation cho hình ảnh
            'description' => 'nullable',
        ]);
        
        $input = $request->all();
       
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }
         
        $product->update($input); // Sử dụng phương thức update của đối tượng $product
    
        // Chuyển hướng về trang danh sách sản phẩm sau khi đã cập nhật thành công
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }
    
    public function Cateupdate(Request $request, Category $category)
    {
        // Validate dữ liệu từ form

        
        $input = $request->all();
       
        $category->update($input); // Sử dụng phương thức update của đối tượng $product
    
        // Chuyển hướng về trang danh sách sản phẩm sau khi đã cập nhật thành công
        return redirect()->route('categoys.index')
            ->with('success', 'Product updated successfully');
    }
    

    // Xóa sản phẩm khỏi cơ sở dữ liệu
    public function destroy(Product $product)
    {
        $product->delete();

        // Chuyển hướng về trang danh sách sản phẩm sau khi đã xóa thành công
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
    public function Catedestroy(Category $category)
    {
        $category->delete();

        // Chuyển hướng về trang danh sách sản phẩm sau khi đã xóa thành công
        return redirect()->route('categorys.index')->with('success', 'Product deleted successfully.');
    }
}
