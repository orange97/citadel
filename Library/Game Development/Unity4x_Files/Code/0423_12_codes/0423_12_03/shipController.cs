using UnityEngine;
using System.Collections;

public class shipController : MonoBehaviour {
	public float minSpeed = 0.1f;
	public float maxSpeed = 5.0f;
	private float acceleration = 0;
	private float speed = 0.0f;
	public AnimationClip animationClip;

	void Start() {
		animation.wrapMode = WrapMode.Loop;
		animation.Play (animationClip.name);
	}

		
	void  Update (){	
		if(Input.GetAxis ("Vertical") != 0.0f){
			acceleration = Input.GetAxis ("Vertical") * 0.01f;
		} else {
			acceleration -= 0.01f * Time.fixedDeltaTime;
		}
		float newSpeed = speed+acceleration;		
		if(newSpeed <= maxSpeed){
			speed += acceleration;
		}		
		if(newSpeed >= minSpeed){
			speed += acceleration;
		} else {
			speed = minSpeed;
		}		
		float rotationY = Input.GetAxis ("Horizontal");		
		transform.Translate(Vector3.forward * speed);
		transform.Rotate (0, rotationY, 0);
		animation[animationClip.name].speed = speed;
	}
}