import React from 'react'
import { Route, Switch } from 'react-router-dom'
import About from './pages/AboutPage'
import Home from './pages/HomePage'
import Picture from './pages/PicturePage'

const routes = (
    <Switch>
        <Route path="/" exact component={Home} />
        <Route path="/about" component={About} />
        <Route path="/picture" component={Picture} />
    </Switch>
);

export default routes;