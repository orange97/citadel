// file: NearestSpawnpoint
using UnityEngine;
using System.Collections;

public class NearestSpawnpoint : MonoBehaviour {
	public GameObject[] respawns;
	public const float FIRE_DELAY = 0.25f;
	private float nextFireTime = 0f;
		
	private void Start(){
		respawns = GameObject.FindGameObjectsWithTag("Respawn");
	}

	void Update() {
		if( Time.time > nextFireTime )
			CheckFireKey();
	}	
	
	void CheckFireKey() {
		if( Input.GetButton("Fire1")) {
			MoveToNewPosition();			
			nextFireTime = Time.time + FIRE_DELAY;
		}
	}
	
	private void MoveToNewPosition(){
		transform.position = NearestSpawnpointPosition();
	}
	
	private Vector3 NearestSpawnpointPosition(){
		if( respawns.Length < 1) return transform.position;
		Vector3 pos = respawns[0].transform.position;
		float shortestDistance = Vector3.Distance( transform.position, pos);
		for(int i = 1; i < respawns.Length; i++){
			Vector3 newPos = respawns[i].transform.position;
			float newDist = Vector3.Distance( transform.position, newPos);
			if( newDist < shortestDistance){
				pos = newPos;
				shortestDistance = newDist;
			}
		}
		
		return pos;
	}
}
