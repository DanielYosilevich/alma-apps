import React from 'react'
import useGlobal from '../store/store'
import TreeDetails from '../components/TreeDetails'

const Home = () => {
    const [globalState] = useGlobal();

    return (
        <div className="central-wrapper">
            <div>Home page</div>
            {Array.apply(null, { length: globalState.tree.size }).map((e, index) => (
                <TreeDetails
                    key={index}
                    level={index + 1}
                    children={globalState.tree.get(index)}
                />
            ))}
        </div>
    )
}

export default Home