<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Respond;
use App\Http\Requests\RespondRequest;
use Carbon\Carbon;

class InteractionController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getOrderBought()
    {
        $id = Auth::user()->id;

        $orders = Order::getBuyer($id);

        if (count($orders) == 0) {
            return redirect()->route('get_profile', $id)->with('message', trans('common.with.no_product_bought'));
        } else {
            return view('site.interaction.order_bought', compact('orders'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrderBoughtDetail($id)
    {
        $orderdetails = OrderDetail::orderBought($id);

        return view('site.interaction.order_bought_detail', compact('orderdetails'));

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function cancelOrder($id)
    {
        try {
            OrderDetail::cancel($id);

            return back()->with('sucess', trans('common.with.cancel_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteOrderBought($id)
    {
        try {
            Order::deleteOrder($id);

            return back()->with('sucess', trans('common.with.delete_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getOrderSold(Request $request)
    {
        $id = Auth::user()->id;
        $orderdetails = OrderDetail::getSold();

        if (count($orderdetails) == 0) {
            return redirect()->route('get_profile', $id)->with('message', trans('common.with.no_order'));
        }

        \App\Models\Notification::where('notifiable_id', '>', 0)->update(['read_at' => Carbon::now()]);

        return view('site.interaction.order_sold', compact('orderdetails'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $orderdetails = Orderdetail::getSold();

        foreach ($orderdetails as $row) {
            $status = $row->status;

            if ($status == 0) {
                $status = 'Delivery now';
            } else {
                $status = 'Handle';
            }

            $order[] = array(
                'Code' => $row->id,
                'Full Name' => $row->order->name,
                'Email' => $row->order->email,
                'Phone' => $row->order->phone_number,
                'Address' => $row->order->address . ', ' . $row->order->local->name,
                'Product' => $row->product->name,
                'Quantity' => $row->quantity,
                'Price/1' => number_format($row->price),
                'Total' => number_format($row->price * $row->quantity),
                'Order Date' => date('d-m-Y', strtotime($row->created_at)),
                'Status' => $status,
                'Note' => $row->order->note,
            );
        }

        return (collect($order));
    }

    /**
     * @return mixed
     */
    public function exportFile()
    {
        return Excel::download(new InteractionController(), 'orders.xlsx');
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Code',
            'Full Name',
            'Email',
            'Phone',
            'Address',
            'Product',
            'Quantity',
            'Price/1',
            'Total',
            'Order Date',
            'Status',
            'Note',
        ];
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleOrderSold($id)
    {
        Orderdetail::handleSold($id);

        return back()->with('sucess', trans('common.with.handle_success'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteOrderSold($id)
    {
        Orderdetail::deleteOrderDetail($id);

        return back()->with('sucess', trans('common.with.delete_success'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function respond()
    {
        return view('site.interaction.respond');
    }

    /**
     * @param RespondRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRespond(RespondRequest $request)
    {
        $request->merge([
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);

        Respond::create($request->all());

        return redirect()->route('home_page')->with('success', trans('common.with.send_success'));
    }
}

