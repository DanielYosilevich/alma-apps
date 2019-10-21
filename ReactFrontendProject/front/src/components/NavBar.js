import React from "react"
import { withRouter } from 'react-router-dom'

const NavBar = (props) => {
    return (
        <React.Fragment>
            <div className="navbar-wrapper">
                <button onClick={() => props.history.push('/')}> Home</button>
                <button onClick={() => props.history.push('/about')}> About</button>
            </div>
            <hr />
        </React.Fragment>
    )
}

export default withRouter(NavBar)