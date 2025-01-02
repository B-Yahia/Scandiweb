import React, { Component } from "react";
import "./ProductListingPages.css";
import ProductCard from "../../Components/ProductCard/ProductCard";
import { GET_PRODUCTS } from "../../GraphQL/queries";
import { withApollo } from "@apollo/client/react/hoc";
import { withRouter } from "../../Components/HOC/withRouter";

class ProductListingPages extends Component {
  constructor(props) {
    super(props);
    this.state = {
      data: null,
      loading: true,
      error: null,
    };
  }

  componentDidMount() {
    this.fetchData();
  }

  componentDidUpdate(prevProps) {
    const { id } = this.props.router.params;
    const oldId = prevProps.router.params.id;
    if (id !== oldId) {
      this.fetchData();
    }
  }

  fetchData = () => {
    const { client } = this.props;
    const { id } = this.props.router.params;
    this.setState({ loading: true });
    client
      .query({
        query: GET_PRODUCTS,
        variables: { category: id },
      })
      .then((result) => {
        this.setState({
          data: result.data,
          loading: false,
        });
      })
      .catch((error) => {
        this.setState({
          error: error,
          loading: false,
        });
      });
  };

  render() {
    const { data, loading, error } = this.state;
    const { id } = this.props.router.params;

    if (loading)
      return (
        <div className="page_container">
          <h1 className="page_title">Loading</h1>
        </div>
      );

    if (error)
      return (
        <div className="page_container">
          <h1 className="page_title">Error: {error.message}</h1>
        </div>
      );

    return (
      <div className="page_container">
        <h1 className="page_title">{id ? id : "All"}</h1>
        <div className="products_cards">
          {data &&
            data.products.map((product) => (
              <ProductCard product={product} key={product.id} />
            ))}
        </div>
      </div>
    );
  }
}

export default withApollo(withRouter(ProductListingPages));
