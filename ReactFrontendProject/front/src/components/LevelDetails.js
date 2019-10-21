import React from 'react'
import { withRouter } from 'react-router-dom'
import useGlobal from '../store/store'

const LevelDetails = (props) => {
    const [globalState, globalActions] = useGlobal();

    const handler = () => {
        if(props.child.type === 'picture') {
            props.history.push({
                pathname: 'picture',
                child: props.child
            })
            return;
        }
        if (globalState.expanded !== props.child.id) {
            globalActions.setExpanded(props.child.id);
            globalActions.clearSublevels(props.child.level);
            globalActions.getTree(props.child.id);
        }
    }

    return (
        <React.Fragment>
            <span style={{ display: "inline-flex" }}>
                <button
                    style={{ backgroundColor: globalActions.setNodeColor(props.child.id,props.child.type) }}
                    className="roundbutton" onClick={handler}>
                    {props.child.id}
                </button>
            </span>
        </React.Fragment>

    )
}

export default withRouter(LevelDetails)