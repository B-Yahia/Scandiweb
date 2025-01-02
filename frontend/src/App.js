import React, { Component } from "react";
import { Route, Routes } from "react-router-dom";
import "./App.css";
import ProductListingPages from "./Pages/ProductListingPages/ProductListingPages";
import Header from "./Components/Header/Header";
import CartModal from "./Components/CartModal/CartModal";
import { connect } from "react-redux";
import ProdutDetailsPage from "./Pages/ProdutDetailsPage/ProdutDetailsPage";

class App extends Component {
  render() {
    const { modal } = this.props;

    return (
      <div className="app_container">
        <Header />
        {modal ? <CartModal display="hiden" /> : <CartModal />}
        <main>
          <Routes>
            <Route path="/" element={<ProductListingPages />} />
            <Route path="/:id" element={<ProductListingPages />} />
            <Route path="/product/:id" element={<ProdutDetailsPage />} />
          </Routes>
        </main>
      </div>
    );
  }
}
const mapStateToProps = (state) => {
  return {
    modal: state.cart.hiden,
  };
};

export default connect(mapStateToProps)(App);
