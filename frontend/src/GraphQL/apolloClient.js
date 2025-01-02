import {
  ApolloClient,
  InMemoryCache,
  ApolloProvider,
  HttpLink,
} from "@apollo/client";

const httpLink = new HttpLink({
  uri: "https://ecom.apitestdomain.site/graphql",
});

const client = new ApolloClient({
  link: httpLink,
  cache: new InMemoryCache(),
});

export default function AppWithProvider({ children }) {
  return <ApolloProvider client={client}>{children}</ApolloProvider>;
}
