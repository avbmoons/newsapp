<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\CreateRequest;
use App\Http\Requests\Orders\EditRequest;
use App\Models\Order;
use App\QueryBuilders\OrdersQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrdersQueryBuilder $ordersQueryBuilder): View
    {
        $ordersList = $ordersQueryBuilder->getOrdersWithPaginathion();

        return view('admin.orders.index', [
            'ordersList' => $ordersList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $statuses = OrderStatus::all();

        return view('admin.orders.create', [
            'statuses' => $statuses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        //$order = new Order($request->except('_token'));
        $order = Order::create($request->validated());

        if ($order->save()) {
            return redirect('/')->with('success', 'Заявка успешно добавлена');
        }

        return \back()->with('error', 'Не удалось сохранить заявку');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order): View
    {
        $statuses = OrderStatus::all();

        return view('admin.orders.edit', [
            'order' => $order,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Order $order): RedirectResponse
    {
        //$order = $order->fill($request->except('_token'));
        $order = $order->fill($request->validated());

        if ($order->save()) {
            return redirect()->route('admin.orders.index')->with('success', 'Изменения успешно внесены');
        }

        return \back()->with('error', 'Не удалось внести изменения');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order): JsonResponse
    {
        try {
            $order->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
