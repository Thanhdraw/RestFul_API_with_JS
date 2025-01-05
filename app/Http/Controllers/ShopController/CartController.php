<?php

namespace App\Http\Controllers\ShopController;

use Darryldecode\Cart\Facades\CartFacade as Cart;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    //
    public function cart()
    {
        try {
            $listCart = Cart::getContent();
            return view('customers.cart.index', compact('listCart'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function addCart(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $cartItem = Cart::getContent()->where('id', $id)->first();

            if ($cartItem) {
                Cart::update(
                    $cartItem->id,
                    [
                        'quantity' => [
                            'relative' => false,
                            'value' => $cartItem->quantity + 1
                        ]
                    ]
                );
                $message = "Product has been updated!";
                return response()->json([
                    'success' => true,
                    'message' => $message,
                    'cart' => Cart::getContent()
                ]);
            } else {
                Cart::add([
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'attributes' => ['image' => $product->image],
                ]);
            }
            return response()->json(['success' => true, 'message' => 'Product added to cart!']);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }



    public function clearCart()
    {
        try {
            // Xóa toàn bộ giỏ hàng
            Cart::clear();
            return redirect()->back()->with('success', 'Cart has been cleared!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function removeCart(Request $request, $id)
    {
        try {
            // Attempt to remove the item from the cart
            $cartItem = Cart::get($id);
            if (!$cartItem) {
                return response()->json([
                    'success' => false,
                    'message' => 'Item not found in cart.'
                ], 404); // Return 404 if the item is not in the cart
            }

            // Remove the item from the cart
            Cart::remove($id);

            return response()->json([
                'success' => true,
                'message' => 'Product removed from cart!',
                'cart' => Cart::getContent() // Optionally return the updated cart content
            ]);

        } catch (\Exception $e) {
            // Return a more detailed error message
            return response()->json([
                'success' => false,
                'message' => 'Failed to remove product: ' . $e->getMessage()
            ], 500); // Return 500 Internal Server Error for unhandled exceptions
        }
    }


    public function updateCart(Request $request)
    {
        try {
            $updatedQuantities = $request->input('updatedQuantities');
            foreach ($updatedQuantities as $updatedQuantity) {
                $productId = $updatedQuantity['productId'];
                $quantity = $updatedQuantity['quantity'];

                Cart::update($productId, [
                    'quantity' => $quantity,
                ]);
            }
            return response()->json(['success' => true, 'message' => 'Cart updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update cart: ' . $e->getMessage()], 500);
        }
    }



}
