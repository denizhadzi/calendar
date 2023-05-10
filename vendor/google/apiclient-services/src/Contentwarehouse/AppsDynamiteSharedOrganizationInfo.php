<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Contentwarehouse;

class AppsDynamiteSharedOrganizationInfo extends \Google\Model
{
  protected $consumerInfoType = AppsDynamiteSharedOrganizationInfoConsumerInfo::class;
  protected $consumerInfoDataType = '';
  protected $customerInfoType = AppsDynamiteSharedOrganizationInfoCustomerInfo::class;
  protected $customerInfoDataType = '';

  /**
   * @param AppsDynamiteSharedOrganizationInfoConsumerInfo
   */
  public function setConsumerInfo(AppsDynamiteSharedOrganizationInfoConsumerInfo $consumerInfo)
  {
    $this->consumerInfo = $consumerInfo;
  }
  /**
   * @return AppsDynamiteSharedOrganizationInfoConsumerInfo
   */
  public function getConsumerInfo()
  {
    return $this->consumerInfo;
  }
  /**
   * @param AppsDynamiteSharedOrganizationInfoCustomerInfo
   */
  public function setCustomerInfo(AppsDynamiteSharedOrganizationInfoCustomerInfo $customerInfo)
  {
    $this->customerInfo = $customerInfo;
  }
  /**
   * @return AppsDynamiteSharedOrganizationInfoCustomerInfo
   */
  public function getCustomerInfo()
  {
    return $this->customerInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedOrganizationInfo::class, 'Google_Service_Contentwarehouse_AppsDynamiteSharedOrganizationInfo');
