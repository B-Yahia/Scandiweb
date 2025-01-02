import React, { Component } from "react";
import { connect } from "react-redux";
import "./CartModal.css";
import OrderlineCard from "../OrderlineCard/OrderlineCard";
import { emptyTheCart } from "../../ReduxStore/CartSlice";
import { withApollo } from "@apollo/client/react/hoc";
import { ADD_ORDER } from "../../GraphQL/queries";
import { getOrderlinesData } from "../../Utils/functions";

class CartModal extends Component {
  constructor(props) {
    super(props);
    this.sendOrder = this.sendOrder.bind(this);
  }

  sendOrder() {
    const { cart, total, dispatch, client } = this.props;
    const orderlines = getOrderlinesData(cart);

    client.mutate({
      mutation: ADD_ORDER,
      variables: {
        order: {
          total: total,
          orderlines: orderlines,
        },
      },
    });

    dispatch(emptyTheCart());
  }

  render() {
    const { cart, total, display } = this.props;

    return (
      <div
        className={
          display === "hiden" ? "modal_container_hiden" : "modal_container"
        }
      >
        <div className="modal_overlay" data-testid="cart-overlay"></div>
        <div className="modal_content">
          <div className="cart_modal_container">
            <div className="cart_modal_title">
              <h3>My bag</h3>
              <p>{cart.length === 1 ? "1 Item" : `${cart.length} Items`}</p>
            </div>
            <div className="orderline_cadrs_container">
              {cart.map((orderLine, index) => (
                <OrderlineCard
                  key={index}
                  orderLine={orderLine}
                  className="orderLine_card"
                />
              ))}
            </div>
            <div className="cart_total">
              <p className="cart_total_price">Total</p>
              <p className="cart_total_price" data-testid="cart-total">
                $ {total}
              </p>
            </div>
            <button
              className="place_order"
              disabled={cart.length === 0}
              onClick={this.sendOrder}
            >
              Place Order
            </button>
          </div>
        </div>
      </div>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    cart: state.cart.order,
    total: state.cart.orderTotal,
  };
};

export default withApollo(connect(mapStateToProps)(CartModal));
